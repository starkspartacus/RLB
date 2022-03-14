<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{
    #[Route('/actualite', name: 'app_actualite')]

    public function index(
        ArticleRepository $articleRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {

        $article = $articleRepository->findAll();
        $data = $article;
         $articles = $paginator->paginate(
             $data,
             $request->query->getInt('page', 1),
             6
         );

        return $this->render('actualite/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
