<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;

class BoulangerieController extends AbstractController
{
    #[Route('/boulangerie', name: 'app_boulangerie')]
    public function index(CategoriesRepository $categoriesRepository, ProductsRepository $productsRepository): Response
    {
        // Trouver la catégorie "boulangerie"
        $boulangerieCategory = $categoriesRepository->findOneBy(['name' => 'boulangerie']);

        if (!$boulangerieCategory) {
            throw $this->createNotFoundException('Category not found');
        }

        // Trouver les produits de la catégorie "boulangerie"
        $boulangerieProducts = $productsRepository->findBy(['category_id' => $boulangerieCategory]);

        return $this->render('boulangerie/boulangerie.html.twig', [
            'boulangerieProducts' => $boulangerieProducts,
        ]);
    }
}
