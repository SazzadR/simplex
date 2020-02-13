<?php

namespace App\Controller;

class HomeController extends Controller
{
    public function home()
    {
        echo $this->getView()->render('home.html', ['name' => 'Fabien']);
    }
}
