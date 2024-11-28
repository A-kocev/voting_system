<?php
    require_once '../../App/Classes/User.php';
    use App\Classes\User;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = new User($_POST['email'],$_POST['password'],$_POST['name']);
    $user->register();
    }else {
        http_response_code(405); 
        echo json_encode(['error' => 'Only POST requests are allowed.']);
        exit;
    }
?>