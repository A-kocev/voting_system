<?php
namespace App\Classes;

require_once '../../DatabaseConfiguration/Database.php';

use PDO;
use Database\Connection as Connection;
    class Election{
        protected $year;
        private $connection;
        public function __construct($year)
        {
            $this->year = $year;
            $connectionObj = new Connection();
            $this->connection = $connectionObj->getPdo();
        }
        public function getElection(){
            $existingElection = $this->connection->prepare('SELECT * FROM elections where year = :year');
            $existingElection->bindParam(':year', $this->year, PDO::PARAM_INT);
            $existingElection->execute();
            $electionData = $existingElection->fetch(PDO::FETCH_ASSOC);
            echo json_encode($electionData);
        }
        public function start(){
            $query = $this->connection->prepare('UPDATE elections SET opened = 1 WHERE year = :year');
            $query->bindParam(':year', $this->year, PDO::PARAM_INT);
            $query->execute();
            echo json_encode(['success' => 'The election has been started']);
        }
        public function end(){
            $query = $this->connection->prepare('UPDATE elections SET opened = 0 WHERE year = :year');
            $query->bindParam(':year', $this->year, PDO::PARAM_INT);
            $query->execute();
            echo json_encode(['success' => 'The election has been ended']);
        }
    }


?>