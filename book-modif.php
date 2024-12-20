<?php
include 'bdconnect.php';
session_start();

// Rediriger vers la page de connexion si l'utilisateur n'est pas authentifié
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
var_dump($_GET);
// Récupérer les informations du livre à modifier
if (isset($_GET['id'])) {
    $query = $pdo->prepare('SELECT * FROM livres WHERE id = ?');
    $query->execute([$_GET['id']]);
    $book = $query->fetch();

    // Stocker les données du livre dans la session
    if ($book) {
        $_SESSION['book_to_modify'] = $book;
    } else {
        // Si le livre n'est pas trouvé, rediriger avec une erreur
        header('Location: bookland.php?error=notfound');
        exit();
    }
}

// Traiter la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        !empty($_POST['name']) &&
        !empty($_POST['type']) &&
        !empty($_POST['author']) &&
        !empty($_POST['description']) &&
        !empty($_POST['fileImage'])
    ) {
        // Récupérer les données mises à jour depuis le formulaire
        $nom = $_POST['name'];
        $genre = $_POST['type'];
        $author = $_POST['author'];
        $summary = $_POST['description'];
        $id = $_SESSION['book_to_modify']['id'];
        $pic = "Images/" . $_POST['fileImage'];

        // Mettre à jour les informations du livre dans la base de données
        $sql = "UPDATE livres
                SET nom = :nom,
                    auteur = :author,
                    genre = :genre,
                    sommaire = :summary,
                    images = :pic
                WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->execute([
            ':nom' => $nom,
            ':author' => $author,
            ':genre' => $genre,
            ':summary' => $summary,
            ':pic' => $pic,
            ':id' => $id
        ]);

        // Nettoyer la session après la mise à jour
        unset($_SESSION['book_to_modify']);

        // Rediriger pour éviter la resoumission
        header('Location: gestionbook.php');
        exit();
    } else {
        $error = 'Veuillez remplir tous les champs.';
    }
}

 include 'book-modif.phtml'; ?>
