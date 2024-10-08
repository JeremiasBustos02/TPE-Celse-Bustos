<?php
class MovieView
{

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
}