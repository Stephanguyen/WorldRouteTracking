<?php

namespace WF3\WRTBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use WF3\WRTBundle\Entity\Cartes;

/**
 * Coordonnees
 *
 * @ORM\Table(name="coordonnees")
 * @ORM\Entity(repositoryClass="WF3\WRTBundle\Repository\CoordonneesRepository")
 */
class Coordonnees
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCoordonnees", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idCoordonees;



   /**
   * @ORM\ManyToOne(targetEntity="WF3\WRTBundle\Entity\Cartes", inversedBy="coordonnees")
   * @ORM\JoinColumn(name="idCartes", referencedColumnName="idCartes")
   */
    private $carte; 

    /**
     * @var int
     *
     * @ORM\Column(name="idCartes", type="integer")
     */
    private $idCartes;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;


    /**
     * Get id
     *
     * @return int
     */
    public function getIdCoordonnees()
    {
        return $this->idCoordonnees;
    }

    /**
     * Set idCarte
     *
     * @param integer $idCarte
     *
     * @return Coordonnees
     */
    public function setIdCarte($idCarte)
    {
        $this->idCarte = $idCarte;

        return $this;
    }

    /**
     * Get idCarte
     *
     * @return int
     */
    public function getIdCarte()
    {
        return $this->idCarte;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Coordonnees
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Coordonnees
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Get idCoordonee
     *
     * @return integer
     */
    public function getIdCoordonee()
    {
        return $this->idCoordonee;
    }

    /**
     * Set carte
     *
     * @param \WF3\WRTBundle\Entity\Cartes $carte
     *
     * @return Coordonnees
     */
    public function setCarte(\WF3\WRTBundle\Entity\Cartes $carte)
    {
        $this->carte = $carte;

        return $this;
    }

    /**
     * Get carte
     *
     * @return \WF3\WRTBundle\Entity\Cartes
     */
    public function getCarte()
    {
        return $this->carte;
    }
}
