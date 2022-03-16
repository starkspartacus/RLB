<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route ("/", name="home")
     */
    public function index(ArticleRepository $articleRepository, CategorieRepository $categorieRepository): Response
    {
        $articles = $articleRepository->lastTree();
        $categories = $categorieRepository->findAll();

        return $this->render('home/index.html.twig', [
            'articles' => $articles,
            'categories' =>$categories,
        ]);
    }


}


