<?php

namespace Salute\WelcomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function indexAction($name)
    {
        $items = array(
                'Taras Timoschik',
                'Aleksandr Zarudniy',
                'Alexey Panteleichuk',
                'Eugeniy Gumennoy'
        );
        $number = rand(1, 30);
        $division = ($number % 2);
        return $this->render('SaluteWelcomeBundle:Welcome:index.html.twig',[
            'name' => $name,
            'division' => $division,
            'number' => $number,
            'items' => $items
        ]);
    }
}