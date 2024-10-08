<?php
class MovieModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    public function getMovies()
    {
        // 2. Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM peliculas');
        $query->execute();

        // 3. Obtengo los datos en un arreglo de objetos
        $movies = $query->fetchAll(PDO::FETCH_OBJ);

        if ($movies) {
            // Si existe la película, retorna el Id_Genero
            return $movies;
        } else {
            // Si no se encontró la película, retornamos null o un valor por defecto
            return null;  // O podrías lanzar una excepción o manejarlo de otra forma
        }
        ;
    }

    public function getMovieById($id)
    {
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE Id = ?');
        $query->execute([$id]);

        $movie = $query->fetch(PDO::FETCH_OBJ);

        return $movie;
    }

    public function getMoviesByGenre($id)
    {
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE Genero_Id = ?');
        $query->execute([$id]);

        $movies = $query->fetchAll(PDO::FETCH_OBJ);

        return $movies;
    }

    public function getGenre($id)
    {
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE Id = ?');
        $query->execute([$id]);

        $movie = $query->fetch(PDO::FETCH_OBJ);

        if ($movie) {
            // Si existe la película, retorna el Id_Genero
            return $movie->Genero_Id;
        } else {
            // Si no se encontró la película, retornamos null o un valor por defecto
            return null;  // O podrías lanzar una excepción o manejarlo de otra forma
        }
        ;
    }
}