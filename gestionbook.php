<?php
include 'bdconnect.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['author']) && !empty($_POST['description']) &&  !empty($_POST['fileImage']) )
{
    $nom=$_POST['name'];
    $genre=$_POST['type'];
    $author=$_POST['author'];
    $summary=$_POST['description'];
    $images= "Images/".$_POST['fileImage'];
    $sql="INSERT INTO livres (nom,genre,auteur,sommaire,images) values(?,?,?,?,?)";
    $query=$pdo->prepare($sql);
    $query->execute( [$nom,$genre,$author,$summary,$images]);
    header('Location:bookland.php');
    exit();
}
$query=$pdo->query("SELECT * FROM livres order by id ");
$livres=$query->fetchAll();

$template='gestionbook';
include 'layout.phtml'
?>