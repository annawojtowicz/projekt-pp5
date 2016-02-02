<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OrdersController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:CarOrder');

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $orders = $repo->getOrdersForUser($user);

        return $this->render('AppBundle:Orders:index.html.twig', array(
            'orders' => $orders
        ));
    }
}
