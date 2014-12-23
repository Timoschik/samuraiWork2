<?php

namespace Salute\WelcomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Samurai
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Salute\WelcomeBundle\Repository\SamuraiRepository")
 */
class Samurai
{
    /**
     * @ORM\ManyToOne(targetEntity="AdvancedPhp", inversedBy="samurai", fetch="EAGER")
     * @ORM\JoinColumn(name="advancedphp_id", referencedColumnName="id")
     */
    protected $advancedphp;

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
     * @ORM\OrderBy({"name"="DESC"})
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="skill", type="float")
     */
    private $skill;


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
     * @return Samurai
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
     * Set skill
     *
     * @param float $skill
     * @return Samurai
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return float 
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set advacedphp
     *
     * @param \Salute\WelcomeBundle\Entity\AdvancedPhp $advacedphp
     * @return Samurai
     */
    public function setAdvancedPhp(\Salute\WelcomeBundle\Entity\AdvancedPhp $advancedphp = null)
    {
        $this->advancedphp = $advancedphp;

        return $this;
    }

    /**
     * Get advacedphp
     *
     * @return \Salute\WelcomeBundle\Entity\AdvancedPhp 
     */
    public function getAdvancedPhp()
    {
        return $this->advancedphp;
    }
}
