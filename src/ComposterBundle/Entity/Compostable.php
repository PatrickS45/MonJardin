<?php

namespace ComposterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compostable
 *
 * @ORM\Table(name="compostable")
 * @ORM\Entity(repositoryClass="ComposterBundle\Repository\CompostableRepository")
 */
class Compostable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="organicWaste", type="string", length=255, unique=true)
     */
    private $organicWaste;

    /**
     * @var bool
     *
     * @ORM\Column(name="isCompostable", type="boolean")
     */
    private $isCompostable;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="preconization", type="text")
     */
    private $preconization;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="text", nullable=true)
     */
    private $image;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set organicWaste
     *
     * @param string $organicWaste
     *
     * @return Compostable
     */
    public function setOrganicWaste($organicWaste)
    {
        $this->organicWaste = $organicWaste;

        return $this;
    }

    /**
     * Get organicWaste
     *
     * @return string
     */
    public function getOrganicWaste()
    {
        return $this->organicWaste;
    }

    /**
     * Set isCompostable
     *
     * @param boolean $isCompostable
     *
     * @return Compostable
     */
    public function setIsCompostable($isCompostable)
    {
        $this->isCompostable = $isCompostable;

        return $this;
    }

    /**
     * Get isCompostable
     *
     * @return bool
     */
    public function getIsCompostable()
    {
        return $this->isCompostable;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Compostable
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set preconization
     *
     * @param string $preconization
     *
     * @return Compostable
     */
    public function setPreconization($preconization)
    {
        $this->preconization = $preconization;

        return $this;
    }

    /**
     * Get preconization
     *
     * @return string
     */
    public function getPreconization()
    {
        return $this->preconization;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Compostable
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}

