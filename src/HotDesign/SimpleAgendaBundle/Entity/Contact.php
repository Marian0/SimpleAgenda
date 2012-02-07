<?php

namespace HotDesign\SimpleAgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use HotDesign\SimpleAgendaBundle\Entity\StaticCompany;

/**
 * HotDesign\SimpleAgendaBundle\Entity\Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity
 */
class Contact {

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
     * @var string $facebook_user
     *
     * @ORM\Column(name="facebook_user", type="string", length=255, nullable=true )
     */
    private $facebook_user;

    /**
     * @var integer $cod_area
     *
     * @ORM\Column(name="cod_area", type="integer")
     */
    private $cod_area;

    /**
     * @var integer $phone
     *
     * @ORM\Column(name="phone", type="integer")
     */
    private $phone;

    /**
     * @var integer $msg_count
     *
     * @ORM\Column(name="msg_count", type="integer")
     */
    private $msg_count;

    /**
     * @var integer $circle
     *
     * @ORM\ManyToOne(targetEntity="HotDesign\SimpleAgendaBundle\Entity\Circle", inversedBy="contacts")
     */
    private $circle;

    /**
     * @var integer $company_id
     *
     * @ORM\Column(name="company_id", type="integer", nullable=true )
     */
    private $company_id;

    public function __construct() {
        $this->msg_count = 0;
        $this->company_id = StaticCompany::getDefaultCompany();
    }

    public function __toString() {
        return $this->title;
    }

    public function getCompanyName() {
        return StaticCompany::getCompanyName($this->company_id);
    }
    //INICIO AUTOGENERADO
    //INICIO AUTOGENERADO
    //INICIO AUTOGENERADO
    //INICIO AUTOGENERADOs

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
     * Set facebook_user
     *
     * @param string $facebookUser
     */
    public function setFacebookUser($facebookUser) {
        $this->facebook_user = $facebookUser;
    }

    /**
     * Get facebook_user
     *
     * @return string 
     */
    public function getFacebookUser() {
        return $this->facebook_user;
    }

    /**
     * Set cod_area
     *
     * @param integer $codArea
     */
    public function setCodArea($codArea) {
        $this->cod_area = $codArea;
    }

    /**
     * Get cod_area
     *
     * @return integer 
     */
    public function getCodArea() {
        return $this->cod_area;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     */
    public function setPhone($phone) {
        $this->phone = $phone;
    }

    /**
     * Get phone
     *
     * @return integer 
     */
    public function getPhone() {
        return $this->phone;
    }


    /**
     * Set msg_count
     *
     * @param integer $msgCount
     */
    public function setMsgCount($msgCount)
    {
        $this->msg_count = $msgCount;
    }

    /**
     * Get msg_count
     *
     * @return integer 
     */
    public function getMsgCount()
    {
        return $this->msg_count;
    }

    /**
     * Set company_id
     *
     * @param integer $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->company_id = $companyId;
    }

    /**
     * Get company_id
     *
     * @return integer 
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * Set circle
     *
     * @param HotDesign\SimpleAgendaBundle\Entity\Circle $circle
     */
    public function setCircle(\HotDesign\SimpleAgendaBundle\Entity\Circle $circle)
    {
        $this->circle = $circle;
    }

    /**
     * Get circle
     *
     * @return HotDesign\SimpleAgendaBundle\Entity\Circle 
     */
    public function getCircle()
    {
        return $this->circle;
    }
}