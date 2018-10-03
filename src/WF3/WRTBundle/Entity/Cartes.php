<?php

namespace WF3\WRTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use WF3\WRTBundle\Entity\Coordonnees;
use AppBundle\Entity\User;

/**
 * Cartes
 *
 * @ORM\Table(name="cartes")
 * @ORM\Entity(repositoryClass="WF3\WRTBundle\Repository\CartesRepository")
 */
class Cartes
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCartes", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idCartes;



    /**
     *
     * @ORM\OneToMany(targetEntity="WF3\WRTBundle\Entity\Coordonnees", mappedBy="carte")
     *
     */
    private $coordonnees;

    /**
   * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
   * @ORM\JoinColumn(name="id", referencedColumnName="id")
   */
    private $user; 


    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=50)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=50)
     */
    private $pays;

    /**
     * @var int
     *
     * @ORM\Column(name="id_utilisateur", type="integer")
     */
    private $idUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="deplacement", type="text")
     */
    private $deplacement;

    /**
     *
     * @ORM\Column(name="temps", type="string")
     */
    private $temps;

    /**
     * @var float
     *
     * @ORM\Column(name="nb_km", type="float")
     */
    private $nbKm;

    /**
     * @var string
     *
     * @ORM\Column(name="difficulte", type="text")
     */
    private $difficulte;

    /**
     * @var string
     *
     * @ORM\Column(name="materiel", type="string", length=500)
     */
    private $materiel;

    /**
     * Get idCarte
     *
     * @return int
     */
    public function getIdCartes()
    {
        return $this->idCartes;
    }




    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Cartes
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Cartes
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Cartes
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set idUtilisateur
     *
     * @param integer $idUtilisateur
     *
     * @return Cartes
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get idUtilisateur
     *
     * @return int
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set deplacement
     *
     * @param string $deplacement
     *
     * @return Cartes
     */
    public function setDeplacement($deplacement)
    {
        $this->deplacement = $deplacement;

        return $this;
    }

    /**
     * Get deplacement
     *
     * @return string
     */
    public function getDeplacement()
    {
        return $this->deplacement;
    }

    /**
     * Set temps
     *
     * @param string $temps
     *
     * @return Cartes
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;

        return $this;
    }

    /**
     * Get temps
     *
     * @param string $temps
     */
    
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * Set nbKm
     *
     * @param float $nbKm
     *
     * @return Cartes
     */
    public function setNbKm($nbKm)
    {
        $this->nbKm = $nbKm;

        return $this;
    }

    /**
     * Get nbKm
     *
     * @return float
     */
    public function getNbKm()
    {
        return $this->nbKm;
    }

    /**
     * Set difficulte
     *
     * @param string $difficulte
     *
     * @return Cartes
     */
    public function setDifficulte($difficulte)
    {
        $this->difficulte = $difficulte;

        return $this;
    }

    /**
     * Get difficulte
     *
     * @return string
     */
    public function getDifficulte()
    {
        return $this->difficulte;
    }

    /**
     * Set materiel
     *
     * @param string $materiel
     *
     * @return Cartes
     */
    public function setMateriel($materiel)
    {
        $this->materiel = $materiel;

        return $this;
    }

    /**
     * Get materiel
     *
     * @return string
     */
    public function getMateriel()
    {
        return $this->materiel;
    }

    /**
     * Add coordonnee
     *
     * @param \WF3\WRTBundle\Entity\Coordonnees $coordonnee
     *
     * @return Cartes
     */
    public function addCoordonnee(\WF3\WRTBundle\Entity\Coordonnees $coordonnee)
    {
        $this->coordonnees[] = $coordonnee;

        $coordonnees -> setCarte($this);

        return $this;
    }

    /**
     * Remove coordonnee
     *
     * @param \WF3\WRTBundle\Entity\Coordonnees $coordonnee
     */
    public function removeCoordonnee(\WF3\WRTBundle\Entity\Coordonnees $coordonnee)
    {
        $this->coordonnees->removeElement($coordonnee);
    }

    /**
     * Get coordonnees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCoordonnees()
    {
        return $this->coordonnees;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->coordonnees = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Cartes
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
