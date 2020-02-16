<?php

namespace App\Repositories;

use App\Models\Article;
use Doctrine\ORM\EntityManager;

class ArticlesRepository implements ArticlesRepositoryInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllArticles()
    {
        return $this->entityManager
            ->getRepository(Article::class)
            ->findAll();
    }
}
