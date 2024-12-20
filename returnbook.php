<?php
session_start();
include 'bdconnect.php';
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $bookId = $_GET['id'];
    $query = $pdo->prepare('UPDATE ordre SET etat = 1 WHERE book_id = ? AND user_id = ?');
    $query->execute([$bookId, $_SESSION['user_id']]);
    header('Location: profile.php');
    exit();
} 
else {
    // Redirect if no book ID is provided
    header('Location: profile.php');
    exit();
}
?>
