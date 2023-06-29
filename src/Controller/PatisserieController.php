<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatisserieController extends AbstractController
{
    #[Route('/patisserie', name: 'app_patisserie')]
    public function index(): Response
    {
        return $this->render('patisserie/patisserie.html.twig', [
            'controller_name' => 'PatisserieController',
        ]);
    }
}
