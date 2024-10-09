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

    public function showGenres()
    {
        $genres = $this->genre->getGenres();
        $this->view->showGenres($genres);
    }

}