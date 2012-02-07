<?php

namespace HotDesign\SimpleAgendaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HotDesign\SimpleAgendaBundle\Entity\Contact;

class DefaultController extends Controller {

    public function indexAction($name) {
        return $this->render('SimpleAgendaBundle:Layout:base.html.twig', array('name' => $name));
    }

    public function sidebarAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $contacts = $em->getRepository('SimpleAgendaBundle:Contact')->findAll();
        
        return $this->render('SimpleAgendaBundle:Default:contact_sidebar.html.twig', array('contacts' => $contacts));
        
        
    }

}
