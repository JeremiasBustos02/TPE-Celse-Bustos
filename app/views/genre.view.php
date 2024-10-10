<?php
class GenreView
{
    private $user = null;
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function showGenres($genres)
    {
        require_once 'templates/genresPage.phtml';
    }
    public function showGenresABM($genres)
    {
        require_once 'templates/genresDB/genresABMPage.phtml';
    }

    public function showModifyForm($genre)
    {
        require 'templates/genresDB/genresABMPage.phtml';
    }
    public function showError($error)
    {
        require 'templates/error.phtml';
    }
}