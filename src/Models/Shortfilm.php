<?php

namespace Site\Models;

class Shortfilm
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $query = $this->db->query('SELECT * FROM shortfilm ORDER BY date DESC');
        $shortfilms = $query->fetchAll();

        return $shortfilms;
    }
}
