<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;

use App\Repository\StageRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\FormationRepository;

class MonSiteController extends AbstractController
{
    public function index($pageSelected, StageRepository $repoStages)
    {
      $listeStages = $repoStages->findAll();

        return $this->render('mon_site/index.html.twig', [
            'listeStages' => $listeStages,
            'pageSelected' => $pageSelected,
        ]);
    }

    public function pageEntreprises(EntrepriseRepository $repoEntreprises)
    {
      $listeEntreprises = $repoEntreprises->findAll();

        return $this->render('mon_site/pageEntreprise.html.twig', [
            'listeEntreprises' => $listeEntreprises,
        ]);
    }

    public function pageFormations(FormationRepository $repoFormations)
    {
      $listeFormations = $repoFormations->findAll();

        return $this->render('mon_site/pageFormations.html.twig', [
            'listeFormations' => $listeFormations,
        ]);
    }

    public function pageStages(Stage $stage)
    {
        //Explication et autre méthode
        /*
            Stage $stage --> permet de récupérer une ressource en passant en paramètre sur l'url un id

            Autre méthode:
            public function pageStages($id, StageRepository $repoStages)
            {
              $stage = $repoStages->findOneById($id);

              return $this->render('mon_site/pageStages.html.twig', [
                  'stage' => $stage,
              ]);
            }

        */

        return $this->render('mon_site/pageStages.html.twig', [
            'stage' => $stage,
        ]);
    }

    public function ListeStagesParEntreprise($idEntreprise, $pageSelected, EntrepriseRepository $repoEntreprises)
    {
      //Récupération de l'entreprise
      $entreprise = $repoEntreprises->findOneById($idEntreprise);

        return $this->render('mon_site/pageListeStage.html.twig', [
            'listeStages' => $entreprise->getStages(),
            'type' => 'Entreprise',
            'name' => $entreprise->getNom(),
            'id' => $idEntreprise,
            'pageSelected' => $pageSelected,
        ]);
    }

    public function ListeStagesParFormation($idFormation, $pageSelected, FormationRepository $repoFormations)
    {
      //Récupération de la formation
      $formation = $repoFormations->findOneById($idFormation);

        return $this->render('mon_site/pageListeStage.html.twig', [
            'listeStages' => $formation->getStages(),
            'type' => 'Formation',
            'name' => $formation->getLibelle(),
            'id' => $idFormation,
            'pageSelected' => $pageSelected,
        ]);
    }


}
