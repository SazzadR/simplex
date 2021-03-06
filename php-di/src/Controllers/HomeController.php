<?php

namespace App\Controllers;

use Twig\Environment;
use Doctrine\ORM\EntityManager;
use App\Repositories\ArticlesRepositoryInterface;

class HomeController extends Controller
{
    private $articlesRepository;

    public function __construct(EntityManager $entityManager, Environment $twig, ArticlesRepositoryInterface $articlesRepository)
    {
        parent::__construct($entityManager, $twig);

        $this->articlesRepository = $articlesRepository;
    }

    public function home()
    {
        $articles = $this->articlesRepository->getAllArticles();

        echo $this->getView()->render('home.twig', ['articles' => $articles]);
    }
}
