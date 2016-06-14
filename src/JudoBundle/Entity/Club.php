<?php
/**
 * Created by PhpStorm.
 * User: lcoue
 * Date: 13/06/2016
 * Time: 12:56
 */

namespace JudoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="club")
 */
class Club
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $nbJudokas;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNbJudokas()
    {
        return $this->nbJudokas;
    }

    /**
     * @param mixed $nbJudokas
     */
    public function setNbJudokas($nbJudokas)
    {
        $this->nbJudokas = $nbJudokas;
    }


}