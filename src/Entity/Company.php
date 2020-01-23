<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="company")
 */
class Company extends JsonSeriali{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\Column(type="text", length=14)
     * @Assert\NotBlank()
     */
    private $CNPJ;

    /**
     * One product has many features. This is the inverse side.
     * @OneToMany(targetEntity="Partner", mappedBy="company")
     */
    private $partners;

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
    public function setId($id): void
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
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCNPJ()
    {
        return $this->CNPJ;
    }

    /**
     * @param mixed $CNPJ
     */
    public function setCNPJ($CNPJ): void
    {
        $this->CNPJ = $CNPJ;
    }

    public function __construct() {
        $this->partners = new ArrayCollection();
    }


}