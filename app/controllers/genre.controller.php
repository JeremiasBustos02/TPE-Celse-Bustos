<?php
require_once './app/views/genre.view.php';
require_once './app/models/genre.model.php';
class GenreController
{
    private $model;
    private $view;

    function __construct($res)
    {
        $this->model = new GenreModel();
        $this->view = new GenreView($res->user);
    }
    public function showGenres()
    {
        $genres = $this->model->getGenres();
        $this->view->showGenres($genres);
    }
    public function showGenresABM()
    {
        $genres = $this->model->getGenres();
        $this->view->showGenresABM($genres);
    }

    public function addGenre() {
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            return $this->view->showError('The name needs to be completed');
        }
    
        if (!isset($_POST['image_url']) || empty($_POST['image_url'])) {
            return $this->view->showError('The URL needs to be completed');
        }
    
        $name = $_POST['name'];
        $image_url = $_POST['image_url'];
    
        $id = $this->model->insertGenre($name, $image_url);
    
        // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
        header('Location: ' . 'dataBaseGenres');
    }

    public function deleteGenre($id) {
        // obtengo la tarea por id
        $genre = $this->model->getGenre($id);

        if (!$genre) {
            return $this->view->showError("Genre with id does not exist = $id");
        }

        // borro la tarea y redirijo
        $this->model->eraseGenre($id);

        header('Location: ' . BASE_URL . 'dataBaseGenres');
    }

    public function showModifyForm($id) {
        $genre = $this->model->getGenre($id);

        if (!$genre) {
            return $this->view->showError("Genre not found with id = $id");
        }

        $this->view->showModifyForm($genre);
    }

    public function updateGenre() {
        if (!isset($_POST['id']) || empty($_POST['id'])) {
            return $this->view->showError('Genre ID is required');
        }

        $id = $_POST['id'];
        $name = $_POST['name'];
        $image_url = $_POST['image_url'];

        $this->model->updateGenre($id, $name, $image_url);

        // Redirigir al listado de géneros después de la modificación
        header('Location: ' . BASE_URL . 'dataBaseGenres');
    }
}