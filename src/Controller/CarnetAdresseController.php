<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity;
use App\Entity\CarnetAdresse;


class CarnetAdresseController extends Controller
{
    /**
     * @Route("/", name="carnet_adresse")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $carnetRepository =  $this->getDoctrine()->getManager()->getRepository(CarnetAdresse::class);
        $carnet = $carnetRepository->getCarnetAdresseParDefaut();

        return $this->render('carnet_adresse/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'codecarnet' => $carnet->getCode(),
            'nomcarnet' => $carnet->getLibelle(),
            'carnet' => $carnet
        ]);

    }
}
