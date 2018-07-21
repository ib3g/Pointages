<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * pointage
 *
 * @ORM\Table(name="pointage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\pointageRepository")
 */
class pointage
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
     *
     * @ORM\ManyToOne(targetEntity="user", inversedBy="pointage")
     * @ORM\JoinColumn(nullable=true)
     *
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_du_jour", type="date", nullable=true)
     */
    private $dateDuJour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_entre", type="time", nullable=true)
     */
    private $heureEntre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut_pause", type="time", nullable=true)
     */
    private $debutPause;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin_pause", type="time", nullable=true)
     */
    private $finPause;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_sorti", type="time", nullable=true)
     */
    private $heureSorti;


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
     * Set heureEntre
     *
     * @param \DateTime $heureEntre
     *
     * @return pointage
     */
    public function setHeureEntre($heureEntre)
    {
        $this->heureEntre = $heureEntre;

        return $this;
    }

    /**
     * Get heureEntre
     *
     * @return \DateTime
     */
    public function getHeureEntre()
    {
        return $this->heureEntre;
    }

    /**
     * Set debutPause
     *
     * @param \DateTime $debutPause
     *
     * @return pointage
     */
    public function setDebutPause($debutPause)
    {
        $this->debutPause = $debutPause;

        return $this;
    }

    /**
     * Get debutPause
     *
     * @return \DateTime
     */
    public function getDebutPause()
    {
        return $this->debutPause;
    }

    /**
     * Set finPause
     *
     * @param \DateTime $finPause
     *
     * @return pointage
     */
    public function setFinPause($finPause)
    {
        $this->finPause = $finPause;

        return $this;
    }

    /**
     * Get finPause
     *
     * @return \DateTime
     */
    public function getFinPause()
    {
        return $this->finPause;
    }

    /**
     * Set heureSorti
     *
     * @param \DateTime $heureSorti
     *
     * @return pointage
     */
    public function setHeureSorti($heureSorti)
    {
        $this->heureSorti = $heureSorti;

        return $this;
    }

    /**
     * Get heureSorti
     *
     * @return \DateTime
     */
    public function getHeureSorti()
    {
        return $this->heureSorti;
    }

    /**
     * Get the value of dateDuJour
     *
     * @return  \DateTime
     */ 
    public function getDateDuJour()
    {
        return $this->dateDuJour;
    }

    /**
     * Set the value of dateDuJour
     *
     * @param  \DateTime  $dateDuJour
     *
     * @return  self
     */ 
    public function setDateDuJour(\DateTime $dateDuJour)
    {
        $this->dateDuJour = $dateDuJour;

        return $this;
    }



    /**
     * Set user
     *
     * @param \AppBundle\Entity\user $user
     *
     * @return pointage
     */
    public function setUser(\AppBundle\Entity\user $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\user
     */
    public function getUser()
    {
        return $this->user;
    }
}
