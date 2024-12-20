<?php
    include 'bdconnect.php';
    session_start();
    if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
    $query=$pdo->prepare('DELETE FROM livres WHERE id=?');
    $query->execute([$_GET['id']]);
    header('Location:bookland.php');
    exit();
    ?>
    