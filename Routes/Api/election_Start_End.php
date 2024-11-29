<?php
require_once '../../App/Classes/Election.php';
use App\Classes\Election;
    $year = $_POST['year'];
    $election = new Election($year);
    if($_POST['do'] == 'start'){

        $election->start();
    }else{
        $election->end();
    }

?>