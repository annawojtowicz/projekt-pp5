<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="CarOrder", mappedBy="car")
     */
    protected $carOrders;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Add carOrders
     *
     * @param \AppBundle\Entity\CarOrder $carOrders
     * @return User
     */
    public function addCarOrder(\AppBundle\Entity\CarOrder $carOrders)
    {
        $this->carOrders[] = $carOrders;

        return $this;
    }

    /**
     * Remove carOrders
     *
     * @param \AppBundle\Entity\CarOrder $carOrders
     */
    public function removeCarOrder(\AppBundle\Entity\CarOrder $carOrders)
    {
        $this->carOrders->removeElement($carOrders);
    }

    /**
     * Get carOrders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCarOrders()
    {
        return $this->carOrders;
    }
}
