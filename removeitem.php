<?php
include 'bdconnect.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];
    $query = $pdo->prepare('DELETE FROM cart WHERE book_id = ? AND user_id = ?');
    $query->execute([$bookId, $_SESSION['user_id']]);
}
header('Location: cart.php');
exit();
?>
