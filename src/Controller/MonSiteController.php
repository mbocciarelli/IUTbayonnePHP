<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;

class MonSiteController extends AbstractController
{
    public function index()
    {
      $repoStages = $this->getDoctrine()->getRepository(Stage::class);
      $listeStages = $repoStages->findAll();

        return $this->render('mon_site/index.html.twig', [
            'listeStages' => $listeStages,
        ]);
    }

    public function pageEntreprises()
    {
      $repoEntreprises = $this->getDoctrine()->getRepository(Entreprise::class);
      $listeEntreprises = $repoEntreprises->findAll();

        return $this->render('mon_site/pageEntreprise.html.twig', [
            'listeEntreprises' => $listeEntreprises,
        ]);
    }

    public function pageFormations()
    {
      $repoFormations = $this->getDoctrine()->getRepository(Formation::class);
      $listeFormations = $repoFormations->findAll();

        return $this->render('mon_site/pageFormations.html.twig', [
            'listeFormations' => $listeFormations,
        ]);
    }

    public function pageStages($id)
    {
        return $this->render('mon_site/pageStages.html.twig', [
            'controller_name' => 'MonSiteController',
            'id' => $id,
        ]);
    }


}
