<?php

namespace PrestaTechnical\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PrestaTechnical\TestBundle\Entity\Developer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {

		$repo = $this->getDoctrine()
		    ->getManager()
		    ->getRepository('PrestaTechnicalTestBundle:Developer');
    	$developers = $repo->findAll();

    	$count = count($developers);

        return $this->render('PrestaTechnicalTestBundle:Default:index.html.twig', array(
        		'developers' => $developers,
        		'count' => $count
        	));

    }

	public function generateCsvAction(){

		$repo = $this->getDoctrine()
		    ->getManager()
		    ->getRepository('PrestaTechnicalTestBundle:Developer');
    	$results = $repo->findAll();
    	// var_dump($results);
    	$count = count($results);

		//Requête
			$handle = fopen(__DIR__.'/../../../../web/data/export/export.csv', 'w');

			// Nom des colonnes du CSV
			fputcsv($handle, array(
				'LASTNAME',
				'FIRSTNAME',
				'BADGE LABEL',
				'BADGE LEVEL',				
			));

			//Champs
			for ($i=0; $i < $count; $i++) { 
			 	# code...
				fputcsv($handle,array(
					$results[$i]->getLastname(),
					$results[$i]->getFirstname(),
					$results[$i]->getBadgeLabel(),
					$results[$i]->getBadgeLevel(),
				));
			 } 

			rewind($handle);
        	$content = stream_get_contents($handle);
			fclose($handle);

			return $this->redirect($this->generateUrl('presta_technical_test_homepage'));
	}
        
}
