<?php
class GenreModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    public function getGenres()
    {
        //Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM generos');
        $query->execute();

        //Obtengo los datos en un arreglo de objetos
        $genres = $query->fetchAll(PDO::FETCH_OBJ);

        if ($genres) {
            // Si existen los generos, retorna los generos
            return $genres;
        } else {
            // Si no se encontraron generos, retornamos null
            return null;
        }
        ;
    }

    public function getNameGenreById($id)
    {
        //Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM generos WHERE Id = ?');
        $query->execute([$id]);

        //Obtengo los datos en un arreglo de objetos
        $genre = $query->fetch(PDO::FETCH_OBJ);

        if ($genre) {
            return $genre->Nombre;
        } else {
            //Si no se encuentra el género, retornamos null
            return null;
        }
    }
}