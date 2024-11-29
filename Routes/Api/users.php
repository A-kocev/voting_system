<?php
require_once '../../App/Classes/User.php';

use App\Classes\User;

$userId = $_GET["userId"];
User::getAllUsersExpectTheCurrentOne($userId);
