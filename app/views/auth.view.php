<?php
class AuthView
{
    private $user = null;
    public function showLogin($error = '') {
        require 'templates/formLogin.phtml';
    }

    
    /* public function login($error = '') {
        require 'templates/home.phtml';
    }
    */
}