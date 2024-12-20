<?php
session_start();
include 'bdconnect.php';
// Redirect if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
if (isset($_POST['selected_books'])) {
    $selectedBooks = $_POST['selected_books'];
    $userId = $_SESSION['user_id'];
    $dateDeb = date('Y-m-d'); 
    $dateFin = date('Y-m-d', strtotime('+2 weeks')); 

    // Check the number of books the user has borrowed with etat = 0
    $checkQuery = $pdo->prepare('SELECT COUNT(*) FROM ordre WHERE user_id = ? AND etat = 0');
    $checkQuery->execute([$userId]);
    $currentBorrowedBooks = $checkQuery->fetchColumn();
    
    if ($currentBorrowedBooks >= 3) {
        // If the user already has 3 or more borrowed books with etat = 0
        echo "<script>alert('You cannot borrow more than 3 books at a time. Please return some books first.'); window.location.href = 'profile.php';</script>";
        exit();
    }

    // Proceed to borrow new books
    $query = $pdo->prepare('INSERT INTO ordre (user_id, book_id, date_deb, date_fin) VALUES ( ?, ?, ?, ?)');

    foreach ($selectedBooks as $bookId) {
        $query->execute([$userId, $bookId, $dateDeb, $dateFin]);
    }

    // Redirect to the profile page after processing
    header('Location: profile.php');
    exit();
}
 else {
    // Redirect if no book is selected
    header('Location: profile.php');
    exit();
}
?>
