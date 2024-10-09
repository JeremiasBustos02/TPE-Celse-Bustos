<?php
class HomeView
{
    private $user = null;

    public function __construct($user) {
        $this->user = $user;
    }
    public function showHome()
    {
        require 'templates/home.phtml';
    }
}