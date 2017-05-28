<?php

namespace Site\Models;

class Joins
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getByDate($date)
    {
        $prepare = $this->db->prepare
        (
            'SELECT * FROM cinema WHERE date = :date
            UNION
            SELECT * FROM dubbing WHERE date = :date
            UNION
            SELECT * FROM onemanshow WHERE date = :date
            UNION
            SELECT * FROM shortfilm WHERE date = :date'
        );
        $prepare->bindValue('date', $date);
        $prepare->execute();
        $content = $prepare->fetchAll();

        return $content;
    }


}
