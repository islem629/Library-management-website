<?php
include 'bdconnect.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$query = $pdo->prepare('
   SELECT 
    u.id AS user_id,
    u.username,
    u.email,
    COUNT(o.id) AS total_orders,
    SUM(CASE WHEN o.etat = 0 THEN 1 ELSE 0 END) AS non_returned_books,
    MIN(DATEDIFF(o.date_fin, CURDATE())) AS days_remaining
    FROM 
    users u
    LEFT JOIN 
    ordre o ON u.id = o.user_id
    WHERE 
    u.role = "client"
    GROUP BY 
    u.id, u.username, u.email
    ORDER BY 
    u.username;

');
$query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);
$template ='gestionUser';
include 'layout.phtml';

?>