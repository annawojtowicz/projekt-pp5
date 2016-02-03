<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Car;

/**
 * Zarzadza akcjami ktore dotycza bezposrednio samochodow
 * Class CarController
 * @package AppBundle\Controller
 */
class CarController extends Controller
{

    public function indexAction(Car $car)
    {
        return $this->render('AppBundle:Car:index.html.twig', array(
            'car' => $car
        ));
    }
}
