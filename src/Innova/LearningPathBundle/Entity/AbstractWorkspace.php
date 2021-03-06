<?php

namespace Innova\LearningPathBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractWorkspace
 *
 * @ORM\Table(name="inl_abstract_workspace")
 * @ORM\Entity
 */
class AbstractWorkspace
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
    * @ORM\ManyToMany(targetEntity="AbstractRessource", mappedBy="abstractWorkspaces", cascade={"remove","persist"})
    */
    private $abstractRessources;

    /**
    * @ORM\OneToOne(targetEntity="Step", cascade={"remove","persist"})
    */
    private $step;

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
     *
     * @return AbstractWorkspace
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
     * Set description
     *
     * @param string $description
     *
     * @return AbstractWorkspace
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->abstractRessources = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add abstractRessources
     *
     * @param  \Innova\LearningPathBundle\Entity\AbstractRessource $abstractRessources
     * @return AbstractWorkspace
     */
    public function addAbstractRessource(\Innova\LearningPathBundle\Entity\AbstractRessource $abstractRessources)
    {
        $this->abstractRessources[] = $abstractRessources;

        return $this;
    }

    /**
     * Remove abstractRessources
     *
     * @param \Innova\LearningPathBundle\Entity\AbstractRessource $abstractRessources
     */
    public function removeAbstractRessource(\Innova\LearningPathBundle\Entity\AbstractRessource $abstractRessources)
    {
        $this->abstractRessources->removeElement($abstractRessources);
    }

    /**
     * Get abstractRessources
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAbstractRessources()
    {
        return $this->abstractRessources;
    }

    /**
     * Set steps
     *
     * @param  \Innova\LearningPathBundle\Entity\Step $steps
     * @return AbstractWorkspace
     */
    public function setStep(\Innova\LearningPathBundle\Entity\Step $step = null)
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Get steps
     *
     * @return \Innova\LearningPathBundle\Entity\Step
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get created
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get updated
     *
     * @return string
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}
