<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MonSiteController extends AbstractController
{
    public function index()
    {
        return $this->render('mon_site/index.html.twig', [
            'controller_name' => 'MonSiteController',
        ]);
    }

    public function pageEntreprises()
    {
        return $this->render('mon_site/pageEntreprise.html.twig', [
            'controller_name' => 'MonSiteController',
        ]);
    }

    public function pageFormations()
    {
        return $this->render('mon_site/pageFormations.html.twig', [
            'controller_name' => 'MonSiteController',
        ]);
    }

    public function pageStages()
    {
        return $this->render('mon_site/pageStages.html.twig', [
            'controller_name' => 'MonSiteController',
        ]);
    }


}
