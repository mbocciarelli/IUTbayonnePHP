<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      //Création d'un générateur de données Faker
      $faker = \Faker\Factory::create('fr_FR');

      //Création des formations
      $DUT_Info = new Formation();
      $DUT_Info->setLibelle("DUT INFO");
      $DUT_Info->setNomComplet("Diplome Universitaire Technologique Informatique");
      $manager->persist($DUT_Info);

      $LPM = new Formation();
      $LPM->setLibelle("LPM");
      $LPM->setNomComplet("License pro multimédia");
      $manager->persist($LPM);

      $DU_TIC = new Formation();
      $DU_TIC->setLibelle("DU TIC");
      $DU_TIC->setNomComplet("Diplome Universitaire Technologique Information et communication");
      $manager->persist($DU_TIC);

      $tableauFormation = array($DUT_Info, $LPM, $DU_TIC);

      //Création des Entreprises
      $Capgemini = new Entreprise();
      $Capgemini->setNom("Capgemini");
      $Capgemini->setActivite("Informatique");
      $Capgemini->setAdresse($faker->address);
      $Capgemini->setSite($faker->url);
      $manager->persist($Capgemini);

      $Sopra = new Entreprise();
      $Sopra->setNom("Sopra Steria");
      $Sopra->setActivite("Informatique");
      $Sopra->setAdresse($faker->address);
      $Sopra->setSite($faker->url);
      $manager->persist($Sopra);

      $Enedis = new Entreprise();
      $Enedis->setNom("Enedis");
      $Enedis->setActivite("Energie");
      $Enedis->setAdresse($faker->address);
      $Enedis->setSite($faker->url);
      $manager->persist($Enedis);

      $NRJ = new Entreprise();
      $NRJ->setNom("NRJ");
      $NRJ->setActivite("Radio");
      $NRJ->setAdresse($faker->address);
      $NRJ->setSite($faker->url);
      $manager->persist($NRJ);

      $tableauEntreprises = array($Capgemini, $Sopra, $Enedis, $NRJ);

      //Création des offres de Stages
      $nombreOffresACreer = $faker->numberBetween($min = 30, $max = 50);

      //Création dee $nombreOffresACreer stages
      for ($i=0; $i < $nombreOffresACreer; $i++) {
          $offre = new Stage();
          $offre->setTitre($faker->jobTitle);
          $offre->setDescription($faker->text($maxNbChars = 255));
          $offre->setMailContact($faker->safeEmail);

          //Définition de l'entreprise proposant le stage
          $entrepriseSelectionnee = $faker->numberBetween($min = 0, $max = 3);
          $tableauEntreprises[$entrepriseSelectionnee]->addStage($offre);

          //Définition des formations proposé par la stages
          $formationsNombre = $faker->numberBetween($min = 1, $max = 3);
          $formationsSelectionnee = $faker->randomElements($array = $tableauFormation, $count = $formationsNombre);
          foreach ($formationsSelectionnee as $value) {
            $value->addStage($offre);
          }

          //Ajout aux elements à ajouter à la base de donnée
          $manager->persist($offre);
      }


      //Transformation en tuplet dans la base de donnée
      $manager->flush();
    }
}
