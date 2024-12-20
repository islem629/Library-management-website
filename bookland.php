<?php
session_start();
$timeout_duration = 1800; 
// Check if the user is logged in and if the timeout period has been exceeded
if (isset($_SESSION['last_activity'])) {
    $elapsed_time = time() - $_SESSION['last_activity'];
    if ($elapsed_time > $timeout_duration) {
        // Destroy the session and redirect to the login page
        session_unset();  // Unset all session variables
        session_destroy(); // Destroy the session
        header('Location: login.php');
        exit();
    }
}
$_SESSION['last_activity'] = time();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
include 'bdconnect.php';
$query=$pdo->query("SELECT * FROM livres order by id ");
$livres=$query->fetchAll();
$template="bookland";
include 'layout.phtml'
?>