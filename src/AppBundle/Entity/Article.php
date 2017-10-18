<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="fk_article_fos_user_idx", columns={"fos_user_id"})})
 * @ORM\Entity
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="theTitle", type="string", length=150, nullable=true)
     */
    private $thetitle;

    /**
     * @var string
     *
     * @ORM\Column(name="theText", type="text", length=65535, nullable=true)
     */
    private $thetext;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="theDate", type="datetime", nullable=true)
     */
    private $thedate;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fos_user_id", referencedColumnName="id")
     * })
     */
    private $fosUser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Section", mappedBy="article")
     */
    private $section;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->section = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set thetitle
     *
     * @param string $thetitle
     *
     * @return Article
     */
    public function setThetitle($thetitle)
    {
        $this->thetitle = $thetitle;

        return $this;
    }

    /**
     * Get thetitle
     *
     * @return string
     */
    public function getThetitle()
    {
        return $this->thetitle;
    }

    /**
     * Set thetext
     *
     * @param string $thetext
     *
     * @return Article
     */
    public function setThetext($thetext)
    {
        $this->thetext = $thetext;

        return $this;
    }

    /**
     * Get thetext
     *
     * @return string
     */
    public function getThetext()
    {
        return $this->thetext;
    }

    /**
     * Set thedate
     *
     * @param \DateTime $thedate
     *
     * @return Article
     */
    public function setThedate($thedate)
    {
        $this->thedate = $thedate;

        return $this;
    }

    /**
     * Get thedate
     *
     * @return \DateTime
     */
    public function getThedate()
    {
        return $this->thedate;
    }

    /**
     * Set fosUser
     *
     * @param \AppBundle\Entity\FosUser $fosUser
     *
     * @return Article
     */
    public function setFosUser(\AppBundle\Entity\FosUser $fosUser = null)
    {
        $this->fosUser = $fosUser;

        return $this;
    }

    /**
     * Get fosUser
     *
     * @return \AppBundle\Entity\FosUser
     */
    public function getFosUser()
    {
        return $this->fosUser;
    }

    /**
     * Add section
     *
     * @param \AppBundle\Entity\Section $section
     *
     * @return Article
     */
    public function addSection(\AppBundle\Entity\Section $section)
    {
        $this->section[] = $section;

        return $this;
    }

    /**
     * Remove section
     *
     * @param \AppBundle\Entity\Section $section
     */
    public function removeSection(\AppBundle\Entity\Section $section)
    {
        $this->section->removeElement($section);
    }

    /**
     * Get section
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSection()
    {
        return $this->section;
    }
}
