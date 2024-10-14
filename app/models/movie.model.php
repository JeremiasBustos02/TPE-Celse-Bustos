<?php
require_once 'config.model.php';
class MovieModel
{
    private $db;

    function __construct() {
        $config = new ConfigModel();
        $this->db = $config->getDB();
    }

    public function getMovies()
    {
        // Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM movies');
        $query->execute();

        // Obtengo los datos en un arreglo de objetos
        $movies = $query->fetchAll(PDO::FETCH_OBJ);

        if ($movies) {
            // Si existe la película, retorna las peliculas
            return $movies;
        } else {
            // Si no se encontró la película, retornamos null
            return null;
        }
        ;
    }

    public function getMovieById($id)
    {
        $query = $this->db->prepare('SELECT * FROM movies WHERE id = ?');
        $query->execute([$id]);

        $movie = $query->fetch(PDO::FETCH_OBJ);

        if ($movie) {
            // Si existe la película, retorna la pelicula
            return $movie;
        } else {
            // Si no se encontró la película, retornamos null
            return null;
        }
    }

    public function getMoviesByGenre($id)
    {
        $query = $this->db->prepare('SELECT * FROM movies WHERE genre_id = ?');
        $query->execute([$id]);

        $movies = $query->fetchAll(PDO::FETCH_OBJ);

        if ($movies) {
            // Si existe la película, retornamos la/s pelicula/s
            return $movies;
        } else {
            // Si no se encontraron peliculas, retormanos null
            return null;
        }
    }

    public function getGenre($id)
    {
        $query = $this->db->prepare('SELECT * FROM movies WHERE genre_id = ?');
        $query->execute([$id]);

        $movie = $query->fetch(PDO::FETCH_OBJ);

        if ($movie) {
            // Si existe la película, retorna el Id_Genero
            return $movie->genre_id;
        } else {
            // Si no se encontró la película, retornamos null o un valor por defecto
            return null;
        }
    }
    public function insertMovie($title, $description, $producer, $duration, $punct_imdb, $image_url, $genre_id) { 
        $query = $this->db->prepare('INSERT INTO movies(title, description, producer, duration, punct_imdb, image_url, genre_id) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $query->execute([$title, $description, $producer, $duration, $punct_imdb, $image_url, $genre_id]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
    public function updateMovie($id, $title, $description, $producer, $duration, $punct_imdb, $image_url, $genre_id) {
        $query = $this->db->prepare('UPDATE movies SET title = ?, description = ?, producer = ?, duration = ?, punct_imdb = ?, image_url = ?, genre_id = ? WHERE id = ?');
        $query->execute([$title, $description, $producer, $duration, $punct_imdb, $image_url, $genre_id, $id]);
    }

    public function eraseMovie($id) {
        $query = $this->db->prepare('DELETE FROM movies WHERE id = ?');
        $query->execute([$id]);
    }
}