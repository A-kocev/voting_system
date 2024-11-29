<?php
require_once '../../App/Classes/Election.php';
use App\Classes\Election;
    $year = date("Y");
    $election = new Election($year);
    $election->getElection();
?>