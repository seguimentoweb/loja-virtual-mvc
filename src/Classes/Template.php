<?php
namespace App\Classes;

class Template
{
    public function loader()
    {
        return new \Twig_Loader_Filesystem([
             '/home/alexandre/Projetos/php/lojavirtual/src/Views/Site',
            '/home/alexandre/Projetos/php/lojavirtual/src/Views/Admin',
        ]);
    }

    public function init()
    {
        return new \Twig_Environment(
            $this->loader(),
            [
                'debug' => true,
                //'cache' => true,
                'auto_reload' => true,
            ]
        );
    }
}