<?php

namespace App\Controller;

use Twig\Environment;

class Controller
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function getView()
    {
        return $this->twig;
    }
}
