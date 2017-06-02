<?php

namespace Site\Models;

class Database
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    //Get all result from each table order by date
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

    //Count all items from each table
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

    //Get only 4 results from each table order by date
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

    //Get one result by slug
    public function getContentById($table, $name)
    {
        switch ($table)
        {
            case 'cinema':
                $prepare = $this->db->prepare('SELECT * FROM cinema WHERE slug=:slug');
                break;
            case 'onemanshow':
                $prepare = $this->db->prepare('SELECT * FROM onemanshow WHERE slug=:slug');
                break;
            case 'dubbing':
                $prepare = $this->db->prepare('SELECT * FROM dubbing WHERE slug=:slug');
                break;
            case 'shortfilm':
                $prepare = $this->db->prepare('SELECT * FROM shortfilm WHERE slug=:slug');
                break;

            default:
                break;
        }
        $prepare->bindValue('slug', $name);
        $prepare->execute();
        $fewContent = $prepare->fetchAll();
        return $fewContent;
    }

    //Get all result order by date
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

    //Get infos from awards
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
