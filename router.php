<?php
require_once 'app/controllers/movie.controller.php';
require_once 'app/controllers/home.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/genre.controller.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/middlewares/verify.auth.middleware.php';
require_once 'libs/response.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'showLogin'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// tabla de ruteo

// home  -> gomeController->showHome();
// movies  -> movieController->showAllMovies();
// movies/:id  -> movieController->showMovie($id);
// genre -> genreController->showGenres($idGenre);
// genres/:id -> MovieController->showMoviesByGenre($idGenre);
// databaseGenres -> genreController->showGenresABM();
// databaseMovies -> movieController->showMoviesABM();
// addGenre -> genreController->addGenre();
// removeGenre -> genreController->deleteGenre();
// modifyGenre/:id -> genreController->showModifyForm($id);
// updateGenre/:id -> genreController->updateMovie();
// addMovie -> MovieController->addMovie();
// removeMovie -> MovieController->deleteMovie();
// modifyMovie/:id -> MovieController->showModifyForm($id);
// updateMovie/:id -> MovieController->updateMovie();
// showLogin -> authController->showLogin();
// login -> authController->login();
// logout -> authController->logout();

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        sessionAuthMiddleware($res);
        $homeController = new HomeController($res);
        $homeController->showHome();
        break;
    case 'movies':
        sessionAuthMiddleware($res);
        $movieController = new MovieController($res);
        if (isset($params[1])) {
            $movieController->showMovie($params[1]);
        } else {
            $movieController->showAllMovies();
        }
        break;
    case 'genre':
        sessionAuthMiddleware($res);
        $movieController = new MovieController($res);
        $genreController = new GenreController($res);
        if (isset($params[1])) {
            $movieController->showMoviesByGenre($params[1]);
        } else {
            $genreController->showGenres();
        }
        break;
    case 'dataBaseGenres':
        sessionAuthMiddleware($res);
        $genreController = new GenreController($res);
        $genreController->showGenresABM();
        break;
    case 'dataBaseMovies':
        sessionAuthMiddleware($res);
        $movieController = new MovieController($res);
        $movieController->showMoviesABM();
        break;
    case 'addGenre':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $genreController = new GenreController($res);
        $genreController->addGenre();
        break;
    case 'removeGenre':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $genreController = new GenreController($res);
        $genreController->deleteGenre($params[1]);
        break;
    case 'modifyGenre':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $genreController = new GenreController($res);
        if (isset($params[1])) {
            $genreController->showModifyForm($params[1]);
        }
        break;
    case 'updateGenre':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $genreController = new GenreController($res);
        $genreController->updateGenre();
        break;
    case 'addMovie':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $movieController = new MovieController($res);
        $movieController->addMovie();
        break;
    case 'removeMovie':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $movieController = new MovieController($res);
        $movieController->deleteMovie($params[1]);
        break;
    case 'modifyMovie':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $movieController = new MovieController($res);
        if (isset($params[1])) {
            $movieController->showModifyForm($params[1]);
        }
        break;
    case 'updateMovie':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $movieController = new MovieController($res);
        $movieController->updateMovie();
        break;
    case 'showLogin':
        $authController = new AuthController();
        $authController->showLogin();
        break;
    case 'login':
        $authController = new AuthController();
        $authController->login();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
}