<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity;

/**
 * Zarzadza akcjami dotyczacymi zamowien
 * Class OrdersController
 * @package AppBundle\Controller
 */
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

    public function rentAction(Entity\Car $car)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $order = new Entity\CarOrder();
        $order->setCar($car);
        $order->setUser($user);
        $order->setDateFrom(new \DateTime());
        $order->setDateTo((new \DateTime())->add(new \DateInterval('P1D')));

        $em = $this->getDoctrine()->getManager();
        $em->persist($order);
        $em->flush();

        return $this->redirectToRoute('app_orders');
    }
}
