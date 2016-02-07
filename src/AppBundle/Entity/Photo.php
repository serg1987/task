<?php
namespace AppBundle\Entity;

class Photo
{
    protected $id;
	protected $title;
    protected $description;
    /**
     * @var string
     */
    private $basename;

    /**
     * @var \AppBundle\Entity\Good
     */
    private $good_id;


    /**
     * Set basename
     *
     * @param string $basename
     * @return Photo
     */
    public function setBasename($basename)
    {
        $this->basename = $basename;

        return $this;
    }

    /**
     * Get basename
     *
     * @return string 
     */
    public function getBasename()
    {
        return $this->basename;
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
     * Set good_id
     *
     * @param \AppBundle\Entity\Good $goodId
     * @return Photo
     */
    public function setGoodId(\AppBundle\Entity\Good $goodId = null)
    {
        $this->good_id = $goodId;

        return $this;
    }

    /**
     * Get good_id
     *
     * @return \AppBundle\Entity\Good 
     */
    public function getGoodId()
    {
        return $this->good_id;
    }
}
