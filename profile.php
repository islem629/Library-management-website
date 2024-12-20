<?php
session_start();
include 'bdconnect.php';
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$query = $pdo->prepare('SELECT livres.nom, livres.auteur, livres.genre, livres.id, ordre.date_deb, ordre.date_fin, ordre.etat
                        FROM ordre
                        JOIN livres ON ordre.book_id = livres.id
                        WHERE ordre.user_id = ?');
$query->execute([$_SESSION['user_id']]);
$borrowedBooks = $query->fetchAll();
$template='profile';
include 'layout.phtml'
?>