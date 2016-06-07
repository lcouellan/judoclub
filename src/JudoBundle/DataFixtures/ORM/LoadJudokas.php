<?php
/**
 * Created by PhpStorm.
 * User: lcoue
 * Date: 07/06/2016
 * Time: 17:54
 */

namespace JudoBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use JudoBundle\Entity\Judoka;

class LoadJudokas implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $judoka1 = new Judoka();
        $judoka1->setFirstName("Jacques");
        $judoka1->setLastName("Dupont");

        $judoka2 = new Judoka();
        $judoka2->setFirstName("Pierre");
        $judoka2->setLastName("Duval");

        $manager->persist($judoka1);
        $manager->persist($judoka2);
        $manager->flush();
    }

}