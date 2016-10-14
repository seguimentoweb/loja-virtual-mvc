<?php
namespace App\Controllers\Site;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $dados = [
            'titulo' => 'Curso PHP OO Loja virtual'
        ];

        $template = $this->twig->loadTemplate('site.home.twig');
        $template->display($dados);
    }
}