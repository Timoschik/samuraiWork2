<?php

namespace Salute\WelcomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Task
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Task
{
    /**
     * @Assert\Type(type="Salute\WelcomeBundle\Entity\Priority")
     * @ORM\ManyToOne(targetEntity="priority", inversedBy="task")
     * @ORM\JoinColumn(name="priority_id", referencedColumnName="id")
     */
    protected  $priority;

    public function getPriority()
    {
        return $this->priority;
    }

    public function setPriority(Priority $priority = null)
    {
        $this->priority = $priority;
    }
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="task", type="string", length=255)
     */
    private $task;

    /**
     * @var string
     * @ORM\Column(name="duedate", type="date")
     */
    private $duedate;

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
     * Set task
     *
     * @param string $task
     * @return Task
     */
    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return string 
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Get duedate
     *
     * @return string 
     */
    public function getDuedate()
    {
        return $this->duedate;
    }

    /**
     * Set duedate
     *
     * @param \DateTime $duedate
     * @return Task
     */
    public function setDuedate($duedate)
    {
        $this->duedate = $duedate;

        return $this;
    }
}
