<?php

namespace PrestaTechnical\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Developer
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PrestaTechnical\TestBundle\Entity\DeveloperRepository")
 */
class Developer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    protected $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    protected $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="badge_label", type="string", length=255)
     */
    protected $badgeLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="badge_level", type="string", length=255)
     */
    protected $badgeLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="badge_total", type="string", length=255, nullable=true)
     */
    protected $badgeTotal;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Developer
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Developer
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set badgeLabel
     *
     * @param string $badgeLabel
     * @return Developer
     */
    public function setBadgeLabel($badgeLabel)
    {
        $this->badgeLabel = $badgeLabel;

        return $this;
    }

    /**
     * Get badgeLabel
     *
     * @return string
     */
    public function getBadgeLabel()
    {
        return $this->badgeLabel;
    }

    /**
     * Set badgeLevel
     *
     * @param integer $badgeLevel
     * @return Developer
     */
    public function setBadgeLevel($badgeLevel)
    {
        $this->badgeLevel = $badgeLevel;

        return $this;
    }

    /**
     * Get badgeLevel
     *
     * @return integer
     */
    public function getBadgeLevel()
    {
        return $this->badgeLevel;
    }

    /**
     * Set badgeTotal
     *
     * @param string $badgeTotal
     * @return Developer
     */
    public function setBadgeTotal($badgeTotal)
    {
        $this->badgeTotal = $badgeTotal;

        return $this;
    }

    /**
     * Get badgeTotal
     *
     * @return string 
     */
    public function getBadgeTotal()
    {
        return $this->badgeTotal;
    }
}
