<?php

namespace Site\Models;

class Artist
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $query = $this->db->query('SELECT * FROM cinema');
        $artist = $query->fetchAll();
    }
}
