<?php

namespace App\Controller;

use App\Entity\Area;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Documento;
use App\Repository\DocumentoRepository;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $documento = $em->getRepository(Documento::class)->findByPlanificacionField();
        //$documento = $em->getRepository(Documento::class)->findBy(['area' => 3, 'estado' => 1]);
        return $this->render('index/index.html.twig', [
            'documento' => $documento,
        ]);
    }

    /**
     * @Route("/medicion", name="medicion")
     */

    public function medicion(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $medicion = $em->getRepository(Documento::class)->findbyMedicionField();
        return $this->render('index/medicion.html.twig', [
            'medicion' => $medicion,
        ]);
    }

    /**
     * @Route("/id", name="id")
     */

    public function id(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $id = $em->getRepository(Documento::class)->findByIDField();
        return $this->render('index/id.html.twig', [
            'id' => $id,
        ]);
    }

    /**
     * @Route("/compras", name="compras")
     */

    public function compras(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $compras = $em->getRepository(Documento::class)->findByComprasField();
        return $this->render('index/compras.html.twig', [
            'compras' => $compras,
        ]);
    }

    /**
     * @Route("/inyectables", name="inyectables")
     */

    public function inyectables(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $compras = $em->getRepository(Documento::class)->findByProduccionINField();
        return $this->render('index/prodiny.html.twig', [
            'compras' => $compras,
        ]);
    }

    /**
     * @Route("/yogurt", name="yogurt")
     */

    public function yogurt(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $compras = $em->getRepository(Documento::class)->findByProducYogurtField();
        return $this->render('index/prodyogurt.html.twig', [
            'compras' => $compras,
        ]);
    }

    /**
     * @Route("/ventas", name="ventas")
     */

    public function ventas(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $compras = $em->getRepository(Documento::class)->findByVentasField();
        return $this->render('index/ventas.html.twig', [
            'compras' => $compras,
        ]);
    }

    /**
     * @Route("/gestion", name="gestion")
     */

    public function gestion(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $compras = $em->getRepository(Documento::class)->findByGestMantField();
        return $this->render('index/gestion.html.twig', [
            'compras' => $compras,
        ]);
    }

    /**
     * @Route("/capitalhumano", name="capitalhumano")
     */

    public function capitalhumano(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $compras = $em->getRepository(Documento::class)->findByCapitalHumField();
        return $this->render('index/capitalhumano.html.twig', [
            'compras' => $compras,
        ]);
    }
}
