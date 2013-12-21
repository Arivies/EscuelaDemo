<?php

namespace ITM\AlumnosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumnos
 *
 * @ORM\Table(name="alumnos")
 * @ORM\Entity(repositoryClass="ITM\AlumnosBundle\Entity\AlumnosRepository")
 */
class Alumnos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nocontrol", type="string", length=15)
     */
    private $nocontrol;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=36)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_paterno", type="string", length=45)
     */
    private $apellido_paterno;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_materno", type="string", length=45)
     */
    private $apellido_materno;

    /** @ORM\ManyToOne(targetEntity="ITM\CarrerasBundle\Entity\Carreras") 
     *  @ORM\JoinColumn(name="carrera", referencedColumnName="id")
     */
    private $carrera;


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
     * Set nocontrol
     *
     * @param string $nocontrol
     * @return Alumnos
     */
    public function setNoControl($nocontrol)
    {
        $this->nocontrol = $nocontrol;
    
        return $this;
    }

    /**
     * Get nocontrol
     *
     * @return string 
     */
    public function getNoControl()
    {
        return $this->nocontrol;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Alumnos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido_paterno
     *
     * @param string $apellidoPaterno
     * @return Alumnos
     */
    public function setApellidoPaterno($apellidoPaterno)
    {
        $this->apellido_paterno = $apellidoPaterno;
    
        return $this;
    }

    /**
     * Get apellido_paterno
     *
     * @return string 
     */
    public function getApellidoPaterno()
    {
        return $this->apellido_paterno;
    }

    /**
     * Set apellido_materno
     *
     * @param string $apellidoMaterno
     * @return Alumnos
     */
    public function setApellidoMaterno($apellidoMaterno)
    {
        $this->apellido_materno = $apellidoMaterno;
    
        return $this;
    }

    /**
     * Get apellido_materno
     *
     * @return string 
     */
    public function getApellidoMaterno()
    {
        return $this->apellido_materno;
    }

    /**
     * Set carrera
     *
     * @param \ITM\CarrerasBundle\Entity\Carreras
     * @return Alumnos
     */
    public function setCarrera(\ITM\CarrerasBundle\Entity\Carreras $carrera)
    {
        $this->carrera = $carrera;
    }

    /**
     * Get carrera
     *
     * @return \ITM\CarrerasBundle\Entity\Carreras
     */
    public function getCarrera()
    {
        return $this->carrera;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}
