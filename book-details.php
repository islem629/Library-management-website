<?php
 session_start(); 
 if (!isset($_SESSION['username']) || $_SESSION['role']!=='client') {
    header('Location: bookland.php');
    exit();
}       
include 'bdconnect.php';
$query=$pdo->query("SELECT * FROM livres WHERE id=" .$_GET['id']);
$elem=$query->fetch(PDO::FETCH_ASSOC);
$template="book-details";
include 'layout.phtml'
?>