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
use JudoBundle\Entity\Club;
use JudoBundle\Entity\Pool;

class LoadPools implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $club1 = new Club();
        $club1->setName("Ducey");
        $club1->setNbJudokas("94");

        $club2 = new Club();
        $club2->setName("Avranches");
        $club2->setNbJudokas("85");

        $club3 = new Club();
        $club3->setName("Pontorson");
        $club3->setNbJudokas("84");
        
        $pool1 = new Pool();
        $pool1->setClub($club1);
        $pool1->setRank("3");
        $pool1->setCategory("Benjamin");

        $pool2 = new Pool();
        $pool2->setClub($club2);
        $pool2->setRank("1");
        $pool2->setCategory("Benjamin");

        $pool3 = new Pool();
        $pool3->setClub($club3);
        $pool3->setRank("2");
        $pool3->setCategory("Benjamin");

        $pool4 = new Pool();
        $pool4->setClub($club3);
        $pool4->setRank("1");
        $pool4->setCategory("Poussin");

        $manager->persist($club1);
        $manager->persist($club2);
        $manager->persist($club3);

        $manager->persist($pool1);
        $manager->persist($pool2);
        $manager->persist($pool3);
        $manager->persist($pool4);
        $manager->flush();
    }

}