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

    public function countAll()
    {
        $query = $this->db->query('SELECT COUNT(*) AS count FROM dubbing');
        $count = $query->fetch();

        return $count;
    }

    public function getFew()
    {
        $query = $this->db->query('SELECT * FROM dubbing ORDER BY date DESC LIMIT 4');
        $fewDubbings = $query->fetchAll();

        return $fewDubbings;
    }
}
