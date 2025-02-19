<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(StarshipRepository $starshipRepository): Response
    {
        $starships = $starshipRepository->findAll();
        $myShip = $starships[array_rand($starships)];

        return $this->render('main/homepage.html.twig', [
            'myShip' => $myShip,
            'ships' => $starships,
        ]);
    }
}
