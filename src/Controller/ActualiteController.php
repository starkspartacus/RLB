<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{

    /**
     * @Route ("/actualité", name="app_actualite")
     */

    public function index(
        ArticleRepository $articleRepository,
        PaginatorInterface $paginator,
        Request $request,
        CategorieRepository $categorieRepository
    ): Response {

        $categories = $categorieRepository->findAll();
        $article = $articleRepository->findAll();

        $data = $article;
         $articles = $paginator->paginate(
             $data,
             $request->query->getInt('page', 1),
             6
         );



        return $this->render('actualite/index.html.twig', [
            'articles' => $articles,
            'categories' =>$categories,

        ]);
    }

    /**
     * @Route ("/actualité/{id}", name="id_actualite")
     */

    public function show(ArticleRepository $articleRepository, $id, CategorieRepository $categorieRepository): Response
    {

        $articles = $articleRepository->find($id);
        $categories = $categorieRepository->findAll();
        $allArticles = $articleRepository->findAll();
        $treeArticles = $articleRepository->lastTree();


        if(!$articles){
           return $this->redirectToRoute('app_actualite');
        }

        return $this->render('actualite/show.html.twig', [
            'articles' => $articles,
            'categories' => $categories,
            'allArticles'=> $allArticles,
            'treeArticles' => $treeArticles,

        ]);
    }



}
