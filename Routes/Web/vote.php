<?php
require_once '../../App/Classes/Vote.php';
require_once '../../App/Classes/Election.php';

use App\Classes\Vote;
use App\Classes\Election;

    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = date("Y");
    $election = new Election($year);
    $election = $election->getElectionByYear();
    $vote = new Vote($_POST['voter'],$_POST['nominee'],$_POST['categories'],$_POST['comment'],$election['id']);
    // var_dump($vote);
    $vote->save();
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Only POST requests are allowed.']);
    exit;
}
