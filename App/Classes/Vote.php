<?php

namespace App\Classes;

require_once '../../DatabaseConfiguration/Database.php';

use PDO;
use Database\Connection as Connection;

class Vote
{
    private $connection;
    protected $voter;
    protected $nominee;
    protected $category;
    protected $comment;
    protected $election;


    public function __construct($voter, $nominee, $category, $comment, $election)
    {
        $this->voter = $voter;
        $this->nominee = $nominee;
        $this->category = $category;
        $this->comment = $comment;
        $this->election = $election;
        $connectionObj = new Connection();
        $this->connection = $connectionObj->getPdo();
    }
    public function save()
    {
        if (count($this->category) > 0) {
            foreach ($this->category as $item) {
                $query = $this->connection->prepare('INSERT INTO votes (voter,nominee,category,comment,election) VALUES (:voter,:nominee,:category,:comment,:election)');
                $voteData = [
                    'voter' => $this->voter,
                    'nominee' => $this->nominee,
                    'category' => $item,
                    'comment' => $this->comment,
                    'election' => $this->election,
                ];
                $query->execute($voteData);
            }
        }
        header('location:../../Resources/Views/index.php?Vote%20Saved');
    }
    public static function getTopVoters()
    {
        $connectionObj = new Connection();
        $connection = $connectionObj->getPdo();
        $query = $connection->prepare('SELECT 
                users.name AS voter_name, 
                COUNT(DISTINCT votes.nominee) AS total_votes
            FROM 
                votes
            JOIN 
                users ON votes.voter = users.id
            WHERE 
                votes.voter != votes.nominee 
            GROUP BY 
                votes.voter
            ORDER BY 
                total_votes DESC');
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
}
