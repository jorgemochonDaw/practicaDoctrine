<?php

/**
* @Entity 
* @Table(name="proveedor")
**/
class Proveedor
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
    public $direccion;

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
     * @return Proveedor
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
     * Set direccion.
     *
     * @param string $direccion
     *
     * @return Proveedor
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion.
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }
}
