<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;

class MariageController extends AbstractController
{
    #[Route('/mariage', name: 'app_mariage')]
    public function index(CategoriesRepository $categoriesRepository, ProductsRepository $productsRepository): Response
    {
        // Trouver la catégorie "mariage"
        $mariageCategory = $categoriesRepository->findOneBy(['name' => 'mariage']);

        if (!$mariageCategory) {
            throw $this->createNotFoundException('Category not found');
        }

        // Trouver les produits de la catégorie "mariage"
        $mariageProducts = $productsRepository->findBy(['category_id' => $mariageCategory]);

        return $this->render('mariage/mariage.html.twig', [
            'mariageProducts' => $mariageProducts,
        ]);
    }
}
