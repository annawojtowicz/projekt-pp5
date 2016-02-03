<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarOrder
 *
 * @ORM\Table(name="car_order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarOrderRepository")
 */
class CarOrder
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateFrom", type="datetime")
     */
    private $dateFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTo", type="datetime")
     */
    private $dateTo;

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="integer", nullable=true)
     */
    private $rate;

    /**
     * @ORM\ManyToOne(targetEntity="Car", inversedBy="carOrders")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     */
    private $car;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="carOrders")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


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
     * Set dateFrom
     *
     * @param \DateTime $dateFrom
     * @return CarOrder
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;

        return $this;
    }

    /**
     * Get dateFrom
     *
     * @return \DateTime 
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * Set dateTo
     *
     * @param \DateTime $dateTo
     * @return CarOrder
     */
    public function setDateTo($dateTo)
    {
        $this->dateTo = $dateTo;

        return $this;
    }

    /**
     * Get dateTo
     *
     * @return \DateTime 
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }

    /**
     * Set rate
     *
     * @param string $rate
     * @return CarOrder
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set car
     *
     * @param \AppBundle\Entity\Car $car
     * @return CarOrder
     */
    public function setCar(\AppBundle\Entity\Car $car = null)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return \AppBundle\Entity\Car 
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return CarOrder
     */
    public function setUser(\AppBundle\Entity\User $user = null)
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

    public function getPrice(){
        $car = $this->getCar();

        $dateFrom = $this->getDateFrom();
        $dateTo = $this->getDateTo();
        $diff = $dateTo->diff($dateFrom);
        return intval($diff->format('%d')) * $car->getPrice();
    }
}
