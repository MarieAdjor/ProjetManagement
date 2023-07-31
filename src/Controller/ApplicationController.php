<?php

namespace App\Controller;

use App\Repository\ChambresRepository;
use App\Repository\ClientsRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{
    #[Route('/', name: 'app_application')]
    public function index(ClientsRepository $client, ChambresRepository $chambre, ReservationRepository $reservation): Response
    {
        
        $clts = $client->countRecords();
        $res = $reservation->countRecords();
        $chbre = $chambre->countRecords();
        return $this->render('application/index.html.twig', [
            //envoi de la valeure de la variable
            'client'=>$clts,'chambre'=>$chbre,'reservation'=>$res,
         
        ]);
    }
}
