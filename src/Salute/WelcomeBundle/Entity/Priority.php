<?php

namespace Salute\WelcomeBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Priority
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Priority
{
    /**
     * @ORM\OneToMany(targetEntity="task", mappedBy="priority")
     */
    private $task;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->task = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(name="value", type="string", length=55)
     */
    private $value;

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function  getValue()
    {
        return $this->value;
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
     * Add task
     *
     * @param \Salute\WelcomeBundle\Entity\Task $task
     * @return Priority
     */
    public function addTask(\Salute\WelcomeBundle\Entity\Task $task)
    {
        $this->task[] = $task;

        return $this;
    }

    /**
     * Remove task
     *
     * @param \Salute\WelcomeBundle\Entity\Task $task
     */
    public function removeTask(\Salute\WelcomeBundle\Entity\Task $task)
    {
        $this->task->removeElement($task);
    }

    /**
     * Get task
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTask()
    {
        return $this->task;
    }
}
