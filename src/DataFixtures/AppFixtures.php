<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $formation = new Formation();
        $formation->setLibelle("DUT INFO");
        $formation->setNomComplet("Diplome Universitaire Technologique Informatique");
        $manager->persist($formation);

        $manager->flush();
    }
}
