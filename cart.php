<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    header('Location: bookland.php');
    exit();
}
include 'bdconnect.php';
$userId = $_SESSION['user_id'];
$user_name= $_SESSION['username'];

if (isset($_POST['id'])) {
    $bookId = $_POST['id'];
    $sqlCheck = "SELECT COUNT(*) FROM cart WHERE user_id = ? AND book_id = ?";
    $stmtCheck = $pdo->prepare($sqlCheck);
    $stmtCheck->execute([$userId, $bookId]);
    $count = $stmtCheck->fetchColumn();

    if ($count > 0) {
        echo "<script>alert('This book is already in your cart!');</script>";
    } else {
        $sqlInsert = "INSERT INTO cart (user_id, book_id,user_name) VALUES (?,?,?)";
        $stmtInsert = $pdo->prepare($sqlInsert);
        $stmtInsert->execute([$userId, $bookId,$user_name]);
        echo "<script>alert('Book added to your cart!');</script>";
    }
}
// Join the `cart` and `livres` tables to get book details
$sql = "SELECT l.* 
        FROM cart c
        JOIN livres l ON c.book_id = l.id
        WHERE c.user_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId]);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
$template="cart";
include 'layout.phtml'
?>