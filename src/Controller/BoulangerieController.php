<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoulangerieController extends AbstractController
{
    #[Route('/boulangerie', name: 'app_boulangerie')]
    public function index(): Response
    {
        return $this->render('boulangerie/boulangerie.html.twig', [
            'controller_name' => 'BoulangerieController',
        ]);
    }
}
