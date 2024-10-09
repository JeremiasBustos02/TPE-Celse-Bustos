<?php
require_once 'app/controllers/movie.controller.php';
require_once 'app/controllers/home.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'libs/response.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'showLogin'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// tabla de ruteo

// home  -> HomeController->showHome();
// peliculas  -> MovieController->showAllMovies();
// peliculas/:Id  -> MovieController->showMovie($id);
// genero/:Id_Genero -> MovieController->showMoviesByGenre($idGenre);
// showLogin -> AuthController->showLogin();

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        sessionAuthMiddleware($res);
        $HomeController = new HomeController($res);
        $HomeController->showHome();
        break;
    case 'movies':
        sessionAuthMiddleware($res);
        $MovieController = new MovieController($res);
        if (isset($params[1])) {
            $MovieController->showMovie($params[1]);
        } else {
            $MovieController->showAllMovies();
        }
        break;
    case 'genre':
        sessionAuthMiddleware($res);
        $MovieController = new MovieController($res);
        if (isset($params[1])) {
            $MovieController->showMoviesByGenre($params[1]);
        } else {
            $MovieController->showGenres();
        }
        break;
    case 'modifyGenres':
        sessionAuthMiddleware($res);
        $MovieController = new MovieController($res);
        $MovieController->showGenresABM();
        break;
    case 'modifyMovies':
        sessionAuthMiddleware($res);
        $MovieController = new MovieController($res);
        $MovieController->showMoviesABM();
        break;
    case 'showLogin':
        $AuthController = new AuthController();
        $AuthController->showLogin();
        break;
    case 'login':
        $AuthController = new AuthController();
        $AuthController->login();
        break;
    case 'logout':
        $AuthController = new AuthController();
        $AuthController->logout();
        break;
}