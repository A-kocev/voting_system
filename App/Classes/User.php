<?php

namespace App\Classes;

require_once '../../DatabaseConfiguration/Database.php';

use PDO;
use Database\Connection as Connection;

$connectionObj = new Connection();
$connection = $connectionObj->getPdo();
class User
{
    private $connection;
    protected $name;
    protected $email;
    protected $password;
    protected $role;

    public function __construct($email, $password, $name = null, $role = 2)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $connectionObj = new Connection();
        $this->connection = $connectionObj->getPdo();
    }
    public function register()
    {
        $existingEmails = $this->connection->query('SELECT email FROM users');
        $existingEmails->execute();
        $existingEmailsData = $existingEmails->fetchAll(PDO::FETCH_ASSOC);

        if ($existingEmailsData) {
            foreach ($existingEmailsData as $email) {
                if ($email['email'] == $_POST['email']) {
                    header('location:../../Resources/Views/index.php?Already%20exists%20an%20account%20with%20this%20email');
                    exit;
                }
            }
        }

        $writeUser = $this->connection->prepare('INSERT INTO users (name,email, password) VALUES (:name, :email, :password)');
        $writeUserData = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => password_hash($this->password, PASSWORD_DEFAULT)
        ];
        $writeUser->execute($writeUserData);

        echo '<script>
        localStorage.setItem("name", "' . $this->name . '");
        localStorage.setItem("userId" , "' . $this->connection->lastInsertId() . '");
        setTimeout(function() {
          window.location.href = "../../Resources/Views/index.php?loggedUser";
        }, 100); 
      </script>';
    }
    public function getUserByEmail()
    {
        $userEmail = $this->connection->prepare('SELECT * from users WHERE email = :email');
        $userEmail->bindParam(':email', $this->email, PDO::PARAM_STR);
        $userEmail->execute();
        $userEmailData = $userEmail->fetch(PDO::FETCH_ASSOC);
        return $userEmailData;
    }
    public function login()
    {
        $userData = $this->getUserByEmail();
        if ($userData) {
            if (password_verify($this->password, $userData['password'])) {
                echo '<script>
                        localStorage.setItem("name", "' . $userData['name'] . '");
                        localStorage.setItem("role", "' . $userData['role'] . '");
                        setTimeout(function() {
                        window.location.href = "../../Resources/Views/index.php?loggedUser";
                        }, 100); 
                    </script>';
            } else {
                header('location:../../Resources/Views/index.php?Wrong%20credentials');
            }
        } else {
            header('location:../../Resources/Views/index.php?Wrong%20credentials');
        }
    }
}
