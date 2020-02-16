<?php

namespace App\Repositories;

interface ArticlesRepositoryInterface
{
    public function getAllArticles();

    public function getArticleById($id);
}
