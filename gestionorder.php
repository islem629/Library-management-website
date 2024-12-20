<?php
include 'bdconnect.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
// Récupérer les commandes depuis la base de données
$query = $pdo->prepare("
    SELECT 
        o.id, 
        o.user_id, 
        o.book_id, 
        o.date_deb, 
        o.date_fin, 
        o.etat, 
        u.username AS user_name,
        b.nom AS book_name
    FROM 
        ordre o
    INNER JOIN users u ON o.user_id = u.id
    INNER JOIN livres b ON o.book_id = b.id
");
$query->execute();
$orders = $query->fetchAll();

// Inclure le template pour l'affichage
$template ='gestionorder';
include 'layout.phtml';
