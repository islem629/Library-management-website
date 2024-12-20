<?php
session_start();
if (isset($_SESSION['username'])) 
        {
            header('Location: bookland.php');
            exit();
        }
include 'bdconnect.php';
if (isset($_POST['loginSubmit'])) {
    extract($_POST);
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if($user['role']=='admin'){
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role']=$user['role'];
            $_SESSION['user_id']=$user['id'];
            header('Location: bookland.php');
            exit();
        }
        if (password_verify($password, $user['password'])) 
        {
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role']=$user['role'];
             $_SESSION['user_id']=$user['id'];

            header('Location: bookland.php');
            exit();
        } 
        else {
        if (password_verify($password, $user['password'])) 
        {
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            header('Location: bookland.php');
            exit();
        } else {
             $_SESSION['flash_message'] = 'Incorrect password. Please try again.';
        }
        }
    } else {
        $_SESSION['flash_message'] = 'User not found. Please check your email.';
    }
}
    $template="account";
    include "layout.phtml";
?>
