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
}
