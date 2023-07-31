<?php

namespace App\Controller;

use App\Repository\FactureRepository;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactureController extends AbstractController
{
    #[Route('/facture', name: 'app_facture')]
    public function index(ReservationRepository $repo): Response
    {
        $liste = $repo->findAll();
        return $this->render('facture/index.html.twig', [
            'facture' => $liste,
        ]);
    }
}
