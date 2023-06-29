<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MariageController extends AbstractController
{
    #[Route('/mariage', name: 'app_mariage')]
    public function index(): Response
    {
        return $this->render('mariage/mariage.html.twig', [
            'controller_name' => 'MariageController',
        ]);
    }
}
