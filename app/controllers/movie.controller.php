<?php
require_once './app/models/movie.model.php';
require_once './app/views/movie.view.php';
require_once './app/models/genre.model.php';

//Opera todo el flujo entre la vista y el modelo
class MovieController
{
    private $model;
    private $view;
    private $genre;

    function __construct($res)
    {
        $this->model = new MovieModel();
        $this->view = new MovieView($res->user);
        $this->genre = new GenreModel();
    }

    //Muestra todas las peliculas que se encuentran en la base de datos
    public function showAllMovies()
    {
        $movies = $this->model->getMovies();
        $genres = $this->genre->getGenres();
        $this->view->showMovies($movies, $genres);
    }

    public function showMovie($id)
    {
        //Busca el id de genero que tiene la pelicula
        $genreId = $this->model->getGenre($id);
        //Trae el nombre del genero
        $genreName = $this->genre->getNameGenreById($genreId);
        //Trae la pelicula que selecciono el usuario
        $movie = $this->model->getMovieById($id);
        //Envia la pelicula y el nombre del genero de la misma
        $this->view->showMovie($movie, $genreName);
    }

    public function showMoviesByGenre($idGenre)
    {
        //Trae todos los generos para poder poner el filtro
        $genres = $this->genre->getGenres();
        //Trae el nombre del genero
        $genreName = $this->genre->getNameGenreById($idGenre);
        //Trae todas las peliculas con el genero seleccionado
        $movies = $this->model->getMoviesByGenre($idGenre);
        //Envia las peliculas y el nombre del genero de la misma
        $this->view->showMoviesByGenre($movies, $genreName, $genres);
    }

    public function showMoviesABM()
    {
        $movies = $this->model->getMovies();
        //Trae todos los generos
        $genres = $this->genre->getGenres();
        $this->view->showMoviesABM($movies, $genres);
    }

    public function showModifyForm($id) {
        $movie = $this->model->getMovieById($id);

        if (!$movie) {
            return $this->view->showError("Movie not found with id = $id");
        }
        //Trae todos los generos
        $genres = $this->genre->getGenres();
        $this->view->showModifyForm($movie, $genres);
    }

    public function addMovie()
    {
        if (!isset($_POST['title']) || empty($_POST['title'])) {
            return $this->view->showError('The name needs to be completed');
        }
        if (!isset($_POST['description']) || empty($_POST['description'])) {
            return $this->view->showError('The description needs to be completed');
        }
        if (!isset($_POST['producer']) || empty($_POST['producer'])) {
            return $this->view->showError('The producer needs to be completed');
        }
        if (!isset($_POST['duration']) || empty($_POST['duration'])) {
            return $this->view->showError('The duration needs to be completed');
        }
        if (!isset($_POST['punct_imdb']) || empty($_POST['punct_imdb'])) {
            return $this->view->showError('The punctuation IMDb needs to be completed');
        }
        if (!isset($_POST['image_url']) || empty($_POST['image_url'])) {
            return $this->view->showError('The URL needs to be completed');
        }
        if (!isset($_POST['genre_id']) || empty($_POST['genre_id'])) {
            return $this->view->showError('The genre id needs to be completed');
        }

        $title = $_POST['title'];
        $description = $_POST['description'];
        $producer = $_POST['producer'];
        $duration = $_POST['duration'];
        $punct_imdb = $_POST['punct_imdb'];
        $image_url = $_POST['image_url'];
        $genre_id = $_POST['genre_id'];

        $id = $this->model->insertMovie($title, $description, $producer, $duration, $punct_imdb, $image_url, $genre_id);

        // Refresco la pagina
        header('Location: ' . 'dataBaseMovies');
    }
    public function deleteMovie($id) {
        // Obtengo la pelicula por id
        $movie = $this->model->getMovieById($id);

        if (!$movie) {
            return $this->view->showError("Movie with id does not exist = $id");
        }

        // Borro la pelicula y redirijo
        $this->model->eraseMovie($id);

        header('Location: ' . BASE_URL . 'dataBaseMovies');
    }

    public function updateMovie() {
        if (!isset($_POST['id']) || empty($_POST['id'])) {
            return $this->view->showError('movie ID is required');
        }

        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $producer = $_POST['producer'];
        $duration = $_POST['duration'];
        $punct_imdb = $_POST['punct_imdb'];
        $image_url = $_POST['image_url'];
        $genre_id = $_POST['genre_id'];

        $this->model->updateMovie($id, $title, $description, $producer, $duration, $punct_imdb, $image_url, $genre_id);

        // Refresco la pagina
        header('Location: ' . BASE_URL . 'dataBaseMovies');
    }
}