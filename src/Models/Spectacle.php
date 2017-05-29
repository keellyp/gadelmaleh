<?php

namespace Site\Models;

class Spectacle
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $query = $this->db->query('SELECT * FROM onemanshow ORDER BY date DESC');
        $spectacles = $query->fetchAll();

        return $spectacles;
    }

    public function countAll()
    {
        $query = $this->db->query('SELECT COUNT(*) AS count FROM onemanshow');
        $count = $query->fetch();

        return $count;
    }

    public function getFew()
    {
        $query = $this->db->query('SELECT * FROM onemanshow ORDER BY date DESC LIMIT 4');
        $fewFilms = $query->fetchAll();

        return $fewFilms;
    }

    public function getContentById($id)
    {
        $prepare = $this->db->prepare('SELECT * FROM onemanshow WHERE id= :id');
        $prepare->bindValue('id', $id);
        $prepare->execute();
        $content = $prepare->fetchAll();

        return $content;
    }
}
