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

    public function showGenres($genres)
    {
        require_once 'templates/genresPage.phtml';
    }

    public function showGenresABM()
    {
        require_once 'templates/genresABMPage.phtml';
    }

    public function showMoviesABM()
    {
        require_once 'templates/moviesABMPage.phtml';
    }
}