<?php

namespace PrestaTechnical\TestBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;

use PrestaTechnical\TestBundle\Entity\Developer;

class ImportCommand extends ContainerAwareCommand
{

   protected function configure()
   {
       // Name and description for app/console command
      $this
      ->setName('import:csv')
      ->setDescription('Import developerss from CSV file');
   }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
      // Showing when the script is launched
      $now = new \DateTime();
      $output->writeln('<comment>Start : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');

       // Importing CSV on DB via Doctrine ORM
      $this->import($input, $output);

      // Showing when the script is over
      $now = new \DateTime();
      $output->writeln('<comment>End : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
   }

  protected function import(InputInterface $input, OutputInterface $output)
  {
      // Getting php array of data from CSV
      $data = $this->get($input, $output);

      // Getting doctrine manager
        
      $em = $this->getContainer()->get('doctrine')->getManager();
      $repo = $em->getRepository('PrestaTechnicalTestBundle:Developer');
      // Turning off doctrine default logs queries for saving memory
      $em->getConnection()->getConfiguration()->setSQLLogger(null);

      // Define the size of record, the frequency for persisting the data and the current index of records
      $size = count($data);
      $batchSize = 20;
      $i = 1;

       // Starting progress
      $progress = new ProgressBar($output, $size);
      $progress->start();

       // $size = sizeOf($data);

      for ($i=0; $i < $size; $i++) {
          $dev = new Developer();
          $string = implode(" ", $data[$i]);
          $array = explode(',', $string );
          $dev->setLastName($array[0]);
          $dev->setFirstName($array[1]);
          $dev->setBadgeLabel($array[2]);
          $dev->setBadgeLevel($array[3]);

          $em->persist($dev);
          if (($i % $batchSize) === 0) {
            $em->flush();
            $em->clear();
            $progress->advance($batchSize);
            $now = new \DateTime();
            $output->writeln(' of developers imported ... | ' . $now->format('d-m-Y G:i:s'));
          }
       }

      $em->flush();
      $em->clear();

   // Ending the progress bar process
       $progress->finish();
   }

   protected function get(InputInterface $input, OutputInterface $output)
   {
       // Getting the CSV from filesystem
       $fileName = 'web/data/import/developers_simple.csv';

       // Using service for converting CSV to PHP Array
       $converter = $this->getContainer()->get('import.csvtoarray');
       $data = $converter->convert($fileName, ';');

       return $data;
   }

}
