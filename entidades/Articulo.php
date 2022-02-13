<?php

/**
 * @Entity
 * @Table(name="articulo")
 **/
class Articulo
{
    /**
     * @Id @Column(type="integer",nullable="false")
     * @GeneratedValue
     **/
    public $id;

    /**
     * @Column(type="string")
     **/
    public $nombre;

    /**
     * @Column(type="string")
     **/
    public $descripcion;
    /**
     * @Column(type="integer")
     **/
    public $precio;
    /**
     * @Column(type="integer")
     **/
    public $cantidad;

    /** 
     * @ManyToOne(targetEntity="Proveedor")
     * @JoinColumn(name="proveedor",referencedColumnName="id",onDelete="CASCADE")
     **/
    public $proveedor;

    /**
     * Get id.
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return Articulo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripción.
     *
     * @param string $descripción
     *
     * @return Articulo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripción.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripción;
    }

    /**
     * Set precio.
     *
     * @param int $precio
     *
     * @return Articulo
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio.
     *
     * @return int
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set cantidad.
     *
     * @param int $cantidad
     *
     * @return Articulo
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad.
     *
     * @return int
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set proveedor.
     *
     * @param string $proveedor
     *
     * @return Articulo
     */
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor.
     *
     * @return string
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }
}
