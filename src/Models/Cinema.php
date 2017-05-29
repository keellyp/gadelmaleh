<?php

namespace Site\Models;

class Cinema
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $query = $this->db->query('SELECT * FROM cinema ORDER BY date DESC');
        $films = $query->fetchAll();

        return $films;
    }

    public function countAll()
    {
        $query = $this->db->query('SELECT COUNT(*) AS count FROM cinema');
        $count = $query->fetch();

        return $count;
    }

    public function getFew()
    {
        $query = $this->db->query('SELECT * FROM cinema ORDER BY date DESC LIMIT 4');
        $fewFilms = $query->fetchAll();

        return $fewFilms;
    }

    public function getContentById($id)
    {
        $prepare = $this->db->prepare('SELECT * FROM cinema WHERE id= :id');
        $prepare->bindValue('id', $id);
        $prepare->execute();
        $content = $prepare->fetchAll();

        echo '<pre>';
        print_r($content);
        echo '</pre>';
    }

}
