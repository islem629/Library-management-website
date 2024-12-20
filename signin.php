<?php
if (isset($_SESSION['username'])) 
        {
            header('Location: bookland.php');
            exit();
        } 
        include 'bdconnect.php';
         if( isset($_GET['regSubmit'])){
            extract($_GET);
            $role="client";
            $checkEmailQuery = "SELECT COUNT(*) FROM users WHERE email = :email";
            $stmt = $pdo->prepare($checkEmailQuery);
            $stmt->execute([':email' => $email]);
            $emailExists = $stmt->fetchColumn();

            if ($emailExists > 0) {
                $_SESSION['flash_message'] = 'This email is already registered. Please use a different email.';
            }
            else{
            $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT) ,
            'role'=>$role,
            ]);
            header('Location: signin.php');
            exit();
            } }
        $template="account";
        include "layout.phtml";
?>