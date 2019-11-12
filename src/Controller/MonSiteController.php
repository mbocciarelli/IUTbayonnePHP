<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MonSiteController extends AbstractController
{
    /**
     * @Route("/", name="monSite")
     */
    public function index()
    {
        return $this->render('mon_site/index.html.twig', [
            'controller_name' => 'MonSiteController',
        ]);
    }

    /**
     * @Route("/entreprises", name="mesEntreprises")
     */
    public function pageEntreprises()
    {
        return $this->render('mon_site/pageEntreprise.html.twig', [
            'controller_name' => 'MonSiteController',
        ]);
    }

    /**
     * @Route("/formations", name="mesFormations")
     */
    public function pageFormations()
    {
        return $this->render('mon_site/pageFormations.html.twig', [
            'controller_name' => 'MonSiteController',
        ]);
    }

    /**
     * @Route("/stages/{id}", name="mesStages")
     */
    public function pageStages()
    {
        return $this->render('mon_site/pageStages.html.twig', [
            'controller_name' => 'MonSiteController',
        ]);
    }


}
