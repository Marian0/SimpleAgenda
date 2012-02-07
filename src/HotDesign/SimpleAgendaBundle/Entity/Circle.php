<?php

namespace HotDesign\SimpleAgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HotDesign\SimpleAgendaBundle\Entity\Circle
 *
 * @ORM\Table(name="circle")
 * @ORM\Entity
 */
class Circle {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var array $contacts
     *
     * @ORM\OneToMany(targetEntity="HotDesign\SimpleAgendaBundle\Entity\Contact", mappedBy="circle")
     */
    private $contacts;

    public function __construct() {
        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->title;
    }

    //INICIO AUTOGENERADO
    //INICIO AUTOGENERADO
    //INICIO AUTOGENERADO
    //INICIO AUTOGENERADO

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }


    /**
     * Add contacts
     *
     * @param HotDesign\SimpleAgendaBundle\Entity\Contact $contacts
     */
    public function addContact(\HotDesign\SimpleAgendaBundle\Entity\Contact $contacts)
    {
        $this->contacts[] = $contacts;
    }

    /**
     * Get contacts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getContacts()
    {
        return $this->contacts;
    }
}