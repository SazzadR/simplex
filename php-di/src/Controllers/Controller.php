<?php

namespace App\Controllers;

use Twig\Environment;
use Doctrine\ORM\EntityManager;

class Controller
{
    private $entityManager;

    private $twig;

    public function __construct(EntityManager $entityManager, Environment $twig)
    {
        $this->entityManager = $entityManager;

        $this->twig = $twig;
    }

    public function getEntityManager()
    {
        return $this->entityManager;
    }

    public function getView()
    {
        return $this->twig;
    }
}
