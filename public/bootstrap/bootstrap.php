<?php
use App\Controllers\Controller;
use App\Classes\Template;

$template = new Template;
$twig = $template->init();

$objController = new Controller;
$calledController = $objController->controller();
$methodController = $objController->method($calledController);

$instance = new $calledController;
$instance->setTwig($twig);
$instance->{$methodController}();
