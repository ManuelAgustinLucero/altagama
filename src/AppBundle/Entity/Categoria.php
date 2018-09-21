<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table(name="Categoria")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoriaRepository")
 */
class Categoria
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
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;


    /**
     * @ORM\OneToMany(targetEntity="Producto", mappedBy="categoria")
     */
    private $categoria;

    public function __construct()
    {
        $this->categoria = new ArrayCollection();
    }



    public function __toString(){
        return (string) $this->descripcion;
    }



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Categoria
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Add categorium
     *
     * @param \AppBundle\Entity\Producto $categorium
     *
     * @return Categoria
     */
    public function addCategorium(\AppBundle\Entity\Producto $categorium)
    {
        $this->categoria[] = $categorium;

        return $this;
    }

    /**
     * Remove categorium
     *
     * @param \AppBundle\Entity\Producto $categorium
     */
    public function removeCategorium(\AppBundle\Entity\Producto $categorium)
    {
        $this->categoria->removeElement($categorium);
    }

    /**
     * Get categoria
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
}
