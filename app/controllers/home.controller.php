<?php
require_once './app/views/home.view.php';

//Este controlador opera el inicio de la pagina
class HomeController
{
    private $view;

    function __construct()
    {
        $this->view = new HomeView();
    }

    public function showHome()
    {
        $this->view->showHome();
    }
}