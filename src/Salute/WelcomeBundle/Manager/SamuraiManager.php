<?php

namespace Salute\WelcomeBundle\Manager;


class SamuraiManager
{
    public function listSamurai()
    {
        $items = array(
            'Taras Timoschik',
            'Aleksandr Zarudniy',
            'Alexey Panteleichuk',
            'Eugeniy Gumennoy'
        );

        return $items;
    }
}