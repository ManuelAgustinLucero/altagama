<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\DetalleVenta;
use AppBundle\Entity\Venta;
use Symfony\Component\HttpFoundation\JsonResponse;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        if ($this->getUser()){
            $em = $this->getDoctrine()->getManager();

            $productos = $em->getRepository('AppBundle:Producto')->findAll();

            return $this->render('default/index.html.twig',array(
                'productos' => $productos,
            ));
        }else{
            return $this->redirectToRoute('fos_user_security_login');

        }
    }


    /**
     * Creates a new cliente entity.
     *
     * @Route("/venta/fechaVenta/{fecha}", name="fechaVenta")
     * @Method({"GET", "POST"})
     */
    public function fechaVentaAction(Request $request,$fecha)
    {
        $f=new \DateTime($fecha);
        $f1=$f->format('Y-m-d 00:00:00');
        $f2=$f->format('Y-m-d 23:59:00');


        $ventas = $this->getDoctrine()
            ->getManager()
            ->createQuery("SELECT e FROM AppBundle:Venta e WHERE e.fecha BETWEEN '$f1' AND '$f2'")
            ->getResult();

        return $this->render('venta/index.html.twig', array(
            'ventas' => $ventas,

        ));

    }
}
