<?php

namespace Site\Models;

class Database
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll($table)
    {
        switch ($table)
        {
            case 'cinema':
                $query = $this->db->query('SELECT * FROM cinema ORDER BY date DESC');
                break;
            case 'onemanshow':
                $query = $this->db->query('SELECT * FROM onemanshow ORDER BY date DESC');
                break;
            case 'dubbing':
                $query = $this->db->query('SELECT * FROM dubbing ORDER BY date DESC');
                break;
            case 'shortfilm':
                $query = $this->db->query('SELECT * FROM shortfilm ORDER BY date DESC');
                break;
            default:
                break;
        }
        $allContents = $query->fetchAll();
        return $allContents;

    }

    public function countAll($table)
    {
        switch ($table)
        {
            case 'cinema':
                $query = $this->db->query('SELECT COUNT(*) AS count FROM cinema');
                break;
            case 'onemanshow':
                $query = $this->db->query('SELECT COUNT(*) AS count FROM onemanshow');
                break;
            case 'dubbing':
                $query = $this->db->query('SELECT COUNT(*) AS count FROM dubbing');
                break;
            case 'shortfilm':
                $query = $this->db->query('SELECT COUNT(*) AS count FROM shortfilm');
                break;

            default:
                break;
        }
        $countAll = $query->fetch();
        return $countAll;
    }

    public function getFew($table)
    {
        switch ($table)
        {
            case 'cinema':
                $query = $this->db->query('SELECT * FROM cinema ORDER BY date DESC LIMIT 4');
                break;
            case 'onemanshow':
                $query = $this->db->query('SELECT * FROM onemanshow ORDER BY date DESC LIMIT 4');
                break;
            case 'dubbing':
                $query = $this->db->query('SELECT * FROM dubbing ORDER BY date DESC LIMIT 4');
                break;
            case 'shortfilm':
                $query = $this->db->query('SELECT * FROM shortfilm ORDER BY date DESC LIMIT 4');
                break;

            default:
                break;
        }
        $fewContent = $query->fetchAll();
        return $fewContent;
    }

    public function getContentById($table, $id)
    {
        switch ($table)
        {
            case 'cinema':
                $prepare = $this->db->prepare('SELECT * FROM cinema WHERE id=:id');
                break;
            case 'onemanshow':
                $prepare = $this->db->prepare('SELECT * FROM onemanshow WHERE id=:id');
                break;
            case 'dubbing':
                $prepare = $this->db->prepare('SELECT * FROM dubbing WHERE id=:id');
                break;
            case 'shortfilm':
                $prepare = $this->db->prepare('SELECT * FROM shortfilm WHERE id=:id');
                break;

            default:
                break;
        }
        $prepare->bindValue('id', $id);
        $prepare->execute();
        $fewContent = $prepare->fetchAll();
        return $fewContent;
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
    public function awards()
    {
        $query = $this->db->query
        (
            'SELECT * FROM award AS a INNER JOIN cinema AS c
            ON c.name = a.film
            UNION
            SELECT * FROM award AS a INNER JOIN dubbing AS d
            ON d.name = a.film
            UNION
            SELECT * FROM award AS a INNER JOIN onemanshow AS o
            ON o.name = a.film
            UNION
            SELECT * FROM award AS a INNER JOIN shortfilm AS s
            ON s.name = a.film'
        );
        $awards = $query->fetchAll();
        return $awards;
    }
}
