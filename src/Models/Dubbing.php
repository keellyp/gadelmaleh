<?php

namespace Site\Models;

class Dubbing
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $query = $this->db->query('SELECT * FROM dubbing ORDER BY date DESC');
        $dubbings = $query->fetchAll();

        return $dubbings;
    }
}
