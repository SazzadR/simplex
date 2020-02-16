<?php

namespace App\Controllers;

use Twig\Environment;
use Doctrine\ORM\EntityManager;
use App\Repositories\ArticlesRepositoryInterface;

class ArticlesController extends Controller
{
    private $articlesRepository;

    public function __construct(EntityManager $entityManager, Environment $twig, ArticlesRepositoryInterface $articlesRepository)
    {
        parent::__construct($entityManager, $twig);

        $this->articlesRepository = $articlesRepository;
    }

    public function show($id)
    {
        $article = $this->articlesRepository->getArticleById($id);

        echo $this->getView()->render('article.twig', ['article' => $article]);
    }
}
