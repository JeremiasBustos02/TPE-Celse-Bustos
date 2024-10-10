<?php
class GenreModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_library;charset=utf8', 'root', '');
    }

    public function getGenres()
    {
        //Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM genres');
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
    }
    public function getGenre($id) {    
        $query = $this->db->prepare('SELECT * FROM genres WHERE id = ?');
        $query->execute([$id]);   
    
        $genre = $query->fetch(PDO::FETCH_OBJ);
    
        return $genre;
    }

    public function eraseGenre($id) {
        $query = $this->db->prepare('DELETE FROM genres WHERE id = ?');
        $query->execute([$id]);
    }

    public function getNameGenreById($id)
    {
        //Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM genres WHERE id = ?');
        $query->execute([$id]);

        //Obtengo los datos en un arreglo de objetos
        $genre = $query->fetch(PDO::FETCH_OBJ);

        if ($genre) {
            return $genre->name;
        } else {
            //Si no se encuentra el género, retornamos null
            return null;
        }
    }

    public function insertGenre($name, $image_url) { 
        $query = $this->db->prepare('INSERT INTO genres(name, image_url) VALUES (?, ?)');
        $query->execute([$name, $image_url]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
    public function updateGenre($id, $name, $image_url) {
        $query = $this->db->prepare('UPDATE genres SET name = ?, image_url = ? WHERE id = ?');
        $query->execute([$name, $image_url, $id]);
    }
}