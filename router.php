<?php
require_once 'app/controllers/movie.controller.php';
require_once 'app/controllers/home.controller.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// tabla de ruteo

// home  -> HomeController->showHome();
// peliculas  -> MovieController->showAllMovies();
// peliculas/:Id  -> MovieController->showMovie($id);
// genero/:Id_Genero -> MovieController->showMoviesByGenre($idGenre);

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $HomeController = new HomeController();
        $HomeController->showHome();
        break;
    case 'peliculas':
        $MovieController = new MovieController();
        if (isset($params[1])) {
            $MovieController->showMovie($params[1]);
        } else {
            $MovieController->showAllMovies();
        }
        break;
    case 'genero':
        $MovieController = new MovieController();
        if (isset($params[1])) {
            $MovieController->showMoviesByGenre($params[1]);
        } else {
            $MovieController->showGenres();
        }
        break;
}