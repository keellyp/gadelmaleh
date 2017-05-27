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

    public function countAll()
    {
        $query = $this->db->query('SELECT COUNT(*) AS count FROM shortfilm');
        $count = $query->fetch();

        return $count;
    }

    public function getFew()
    {
        $query = $this->db->query('SELECT * FROM shortfilm ORDER BY date DESC LIMIT 4');
        $fewShort = $query->fetchAll();

        return $fewShort;
    }
}
