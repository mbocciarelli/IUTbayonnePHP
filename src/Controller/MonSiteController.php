<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;

class MonSiteController extends AbstractController
{
    public function index($pageSelected)
    {
      $repoStages = $this->getDoctrine()->getRepository(Stage::class);
      $listeStages = $repoStages->findAll();

        return $this->render('mon_site/index.html.twig', [
            'listeStages' => $listeStages,
            'pageSelected' => $pageSelected,
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
      $request = Request::createFromGlobals();

      $repoFormations = $this->getDoctrine()->getRepository(Formation::class);
      $listeFormations = $repoFormations->findAll();

        return $this->render('mon_site/pageFormations.html.twig', [
            'listeFormations' => $listeFormations,
        ]);
    }

    public function pageStages($id)
    {
      $repoStages = $this->getDoctrine()->getRepository(Stage::class);
      $stage = $repoStages->findOneBy(['id' => $id]);

        return $this->render('mon_site/pageStages.html.twig', [
            'stage' => $stage,
        ]);
    }

    public function ListeStagesParEntreprise($idEntreprise, $pageSelected)
    {
      //Récupération de l'entreprise
      $repoEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
      $entreprise = $repoEntreprise->findOneById($idEntreprise);

        return $this->render('mon_site/pageListeStage.html.twig', [
            'listeStages' => $entreprise->getStages(),
            'type' => 'Entreprise',
            'name' => $entreprise->getNom(),
            'id' => $idEntreprise,
            'pageSelected' => $pageSelected,
        ]);
    }

    public function ListeStagesParFormation($idFormation, $pageSelected)
    {
      //Récupération de la formation
      $repoFormation = $this->getDoctrine()->getRepository(Formation::class);
      $formation = $repoFormation->findOneById($idFormation);

        return $this->render('mon_site/pageListeStage.html.twig', [
            'listeStages' => $formation->getStages(),
            'type' => 'Formation',
            'name' => $formation->getLibelle(),
            'id' => $idFormation,
            'pageSelected' => $pageSelected,
        ]);
    }


}
