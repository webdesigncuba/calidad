<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Area;

class MenuController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     */
    public function menu(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $area = $em->getRepository(Area::class)->findAll();
        return $this->render('menu/index.html.twig', [
            'area' => $area,
        ]);
    }
}
