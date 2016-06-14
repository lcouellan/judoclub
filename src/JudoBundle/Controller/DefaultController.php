<?php

namespace JudoBundle\Controller;

use JudoBundle\Entity\Ranking;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $this->setPointsForAllClubs();
        $rankings = $this->getDoctrine()->getRepository('JudoBundle:Ranking')->findBy(
            [],
            array('points' => 'DESC')
        );
        $rankingB = $this->getDoctrine()->getRepository('JudoBundle:Pool')->findBy(
            array('category' => "Benjamin"),
            array('rank' => 'ASC')
        );
        $rankingP = $this->getDoctrine()->getRepository('JudoBundle:Pool')->findBy(
            array('category' => "Poussin"),
            array('rank' => 'ASC')
        );

        return $this->render('JudoBundle:Default:index.html.twig',["rankings"=>$rankings,"rankingsB"=>$rankingB,"rankingsP"=>$rankingP]);
    }

    public function setRanking($club,$points){
        $em = $this->getDoctrine()->getManager();
        $ranking = new Ranking();
        $ranking->setSeason("2015-2016");
        $ranking->setClub($club);
        $ranking->setPoints($points);
        $em->persist($ranking);
        $em->flush();
    }

    public function setPointsForAllClubs(){
        $clubs = $this->getDoctrine()
            ->getRepository('JudoBundle:Club')
            ->findAll();
        foreach ($clubs as $club){
            if($this->isUnusedClub($club))
                $this->setRanking($club,$this->getPointsFromPools($club->getId()));
        }
    }
    public function getPointsFromPools($idClub){
        $points = 0;
        $pools = $this->getDoctrine()
            ->getRepository('JudoBundle:Pool')
            ->findBy(
                array('club' => $idClub),
                array('rank' => 'ASC')
            );
        foreach ($pools as $pool) {
            switch ($pool->getRank()){
                case 1:
                    $points += 10;
                    break;
                case 2:
                    $points += 5;
                    break;

                case 3:
                    $points += 3;
                    break;

                default:
                    break;
            }
        }
        return $points;
    }

    public function isUnusedClub($idClub) {
        $clubs = $this->getDoctrine()
            ->getRepository('JudoBundle:Ranking')
            ->findBy(["club"=>$idClub]);
        return empty($clubs[0]);
    }
}
