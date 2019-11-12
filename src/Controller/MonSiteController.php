<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MonSiteController extends AbstractController
{
    /**
     * @Route("/mon/site", name="mon_site")
     */
    public function index()
    {
        return $this->render('mon_site/index.html.twig', [
            'controller_name' => 'MonSiteController',
        ]);
    }
}
