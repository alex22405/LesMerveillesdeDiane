<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;

class AnniversaireController extends AbstractController
{
    #[Route('/anniversaire', name: 'app_anniversaire')]
    public function index(CategoriesRepository $categoriesRepository, ProductsRepository $productsRepository): Response
    {
        // Trouver la catégorie "Anniversaire"
        $anniversaireCategory = $categoriesRepository->findOneBy(['name' => 'Anniversaire']);

        if (!$anniversaireCategory) {
            throw $this->createNotFoundException('Category not found');
        }

        // Trouver les produits de la catégorie "Anniversaire"
        $anniversaireProducts = $productsRepository->findBy(['category_id' => $anniversaireCategory]);

        return $this->render('anniversaire/anniversaire.html.twig', [
            'anniversaireProducts' => $anniversaireProducts,
        ]);
    }
}
