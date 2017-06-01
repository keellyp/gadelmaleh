<?php

namespace Site\Models;

class Database
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // public function getAll($table)
    // {
    //     $prepare = $this->db->prepare('SELECT * FROM :table ORDER BY date DESC');
    //     $prepare->bindValue(':table', $table);
    //     $prepare->execute();
    //     $content = $prepare->fetchAll();
    //
    //     return $content;
    // }
    //
    // public function countAll($table)
    // {
    //     $query = $this->db->query('SELECT COUNT(*) AS count FROM cinema');
    //     $count = $query->fetch();
    //
    //     return $count;
    // }

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

    // public function getContentById($table, $id)
    // {
    //     $prepare = $this->db->prepare('SELECT * FROM cinema WHERE id= :id');
    //     $prepare->bindValue('id', $id);
    //     $prepare->execute();
    //     $content = $prepare->fetchAll();
    //
    //     return $content;
    // }

}
