<?php

namespace App\DataFixtures;

use App\Entity\Compte;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class compteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $compte = new Compte();
        $compte->setNom('Fournisseurs');
        $compte->setNum√©roComptable(401);

        $manager->persist($compte);

        $compte =  new Compte();
        $compte->setNom('Caisse');
        $compte->setNum√©roComptable(530);

        $manager->persist($compte);

        $manager->flush();
    }
}