<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 *Zarzadza akcjami na stronie glownej
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:Car');

        $allCars = $repo->getAllCars();
        $mostPopular = $repo->getMostPopularCars();
        $bestRated = $repo->getBestRatedCars();
        $categories = $repo->getCategories();

        return $this->render('AppBundle:Default:index.html.twig', array(
            'allCars' => $allCars,
            'mostPopular' => $mostPopular,
            'bestRated' => $bestRated,
            'categories' => $categories
        ));
    }
}
