<?php

namespace Salute\WelcomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AdvancedPhp
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AdvancedPhp
{
    /**
     * @ORM\OneToMany(targetEntity="Samurai", mappedBy="advancedphp")
     */
    protected $samurai;

    public function __construct()
    {
        $this->samurai = new ArrayCollection();
    }
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     * @return AdvancedPhp
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add samurai
     *
     * @param \Salute\WelcomeBundle\Entity\Samurai $samurai
     * @return AdvancedPhp
     */
    public function addSamurai(\Salute\WelcomeBundle\Entity\Samurai $samurai)
    {
        $this->samurai[] = $samurai;

        return $this;
    }

    /**
     * Remove samurai
     *
     * @param \Salute\WelcomeBundle\Entity\Samurai $samurai
     */
    public function removeSamurai(\Salute\WelcomeBundle\Entity\Samurai $samurai)
    {
        $this->samurai->removeElement($samurai);
    }

    /**
     * Get samurai
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSamurai()
    {
        return $this->samurai;
    }
}
