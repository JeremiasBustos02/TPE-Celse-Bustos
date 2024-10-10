<?php
class MovieView
{
    private $user = null;
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function showMovies($movies, $genres)
    {
        require_once 'templates/moviesPage.phtml';
    }

    public function showMovie($movie, $genreName)
    {
        require_once 'templates/moviePage.phtml';
    }

    public function showMoviesByGenre($movies, $genreName, $genres)
    {
        require_once 'templates/moviesPage.phtml';
    }

    public function showMoviesABM($movies, $genres)
    {
        require_once 'templates/moviesDB/moviesABMPage.phtml';
    }

    public function showModifyForm($movie, $genres)
    {
        require 'templates/moviesDB/moviesABMPage.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}