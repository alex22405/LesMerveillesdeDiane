<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;

class PatisserieController extends AbstractController
{
    #[Route('/patisserie', name: 'app_patisserie')]
    public function index(CategoriesRepository $categoriesRepository, ProductsRepository $productsRepository): Response
    {
        // Trouver la catégorie "patisserie"
        $patisserieCategory = $categoriesRepository->findOneBy(['name' => 'patisserie']);

        if (!$patisserieCategory) {
            throw $this->createNotFoundException('Category not found');
        }

        // Trouver les produits de la catégorie "patisserie"
        $patisserieProducts = $productsRepository->findBy(['category' => $patisserieCategory]);

        return $this->render('patisserie/patisserie.html.twig', [
            'patisserieProducts' => $patisserieProducts,
        ]);
    }
}
