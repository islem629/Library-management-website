<?php
include 'bdconnect.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $pdo->prepare("DELETE FROM ordre WHERE id = ?");
    $query->execute([$id]);
}
header('Location: gestionorder.php');
exit();
