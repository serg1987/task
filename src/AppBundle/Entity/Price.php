<?php
namespace AppBundle\Entity;

class Price
{
    protected $id;
	protected $price_type_id;
    protected $good_id;
	protected $price;

    /**
     * Set price_type_id
     *
     * @param integer $priceTypeId
     * @return Price
     */
    public function setPriceTypeId($priceTypeId)
    {
        $this->price_type_id = $priceTypeId;

        return $this;
    }

    /**
     * Get price_type_id
     *
     * @return integer 
     */
    public function getPriceTypeId()
    {
        return $this->price_type_id;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Price
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
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
     * @return Price
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
