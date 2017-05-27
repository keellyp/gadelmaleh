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
}
