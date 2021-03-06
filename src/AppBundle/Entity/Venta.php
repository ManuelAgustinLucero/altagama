<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Venta
 *
 * @ORM\Table(name="venta")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VentaRepository")
 */
class Venta
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
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")

     */
    private $fecha;


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
     * Set total
     *
     * @param float $total
     *
     * @return Venta
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Venta
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="venta")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    private $cliente;

    /**
     * @ORM\OneToMany(targetEntity="DetalleVenta", mappedBy="venta")
     */
    private $detalleVenta;

    public function __construct()
    {
        $this->detalleVenta = new ArrayCollection();
    }

    /**
     * Set cliente
     *
     * @param \AppBundle\Entity\Cliente $cliente
     *
     * @return Venta
     */
    public function setCliente(\AppBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \AppBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Add detalleVentum
     *
     * @param \AppBundle\Entity\DetalleVenta $detalleVentum
     *
     * @return Venta
     */
    public function addDetalleVentum(\AppBundle\Entity\DetalleVenta $detalleVentum)
    {
        $this->detalleVenta[] = $detalleVentum;

        return $this;
    }

    /**
     * Remove detalleVentum
     *
     * @param \AppBundle\Entity\DetalleVenta $detalleVentum
     */
    public function removeDetalleVentum(\AppBundle\Entity\DetalleVenta $detalleVentum)
    {
        $this->detalleVenta->removeElement($detalleVentum);
    }

    /**
     * Get detalleVenta
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetalleVenta()
    {
        return $this->detalleVenta;
    }
}
