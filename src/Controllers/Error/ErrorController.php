<?php
namespace App\Controllers\Error;


class ErrorController
{
    public function index()
    {
        echo 'Error';
    }

    public function error400()
    {
        echo '400';
    }

    public function error404()
    {
        echo '404';
    }

    public function error302()
    {
        echo '302';
    }

    public function error500()
    {
        echo '500';
    }
}