<?php
$success = null;
$error = null;
require_once('../database/db.php');

if (isset($_POST['add'])) {
    $title = htmlspecialchars($_POST['title']);
    $description = $_POST['description'];
    $imageName = $_FILES["uploadfile"]["name"];
    $imageSize = $_FILES["uploadfile"]["size"];
    $imageTemp = $_FILES["uploadfile"]["tmp_name"];
    $imageFolder = "../pages/ebook_images/" . $imageName;
    $ebookName = $_FILES["ebookfile"]["name"];
    $ebookTemp = $_FILES["ebookfile"]["tmp_name"];
    $ebookFolder = "../pages/ebooks/" . $ebookName;
    $allowedExtensions = ['png', 'jpg', 'jpeg'];
    $pattern = '/\.(' . implode('|', $allowedExtensions) . ')$/i';

    // Vérification des champs obligatoires
    if (empty($title) || empty($description)) {
        $error = "Veuillez remplir tous les champs";
    } elseif (empty($imageName)) {
        $error = "Veuillez choisir une image pour l'E-book";
    } elseif (!preg_match($pattern, $imageName)) {
        $error = "Votre fichier image doit être au format \"jpg, jpeg ou png\"";
    } elseif ($imageSize > 2000000) {
        $error = "Votre fichier image ne doit pas dépasser 2Mo";
    } elseif (empty($ebookName)) {
        $error = "Veuillez choisir un fichier PDF pour l'E-book";
    } elseif (pathinfo($ebookName, PATHINFO_EXTENSION) != 'pdf') {
        $error = "Le fichier doit être au format PDF";
    } else {
        // Vérifier si un E-book avec le même titre existe déjà
        $existing_ebook_query = $db->prepare("SELECT * FROM ebooks WHERE title=:title");
        $existing_ebook_query->execute(['title' => $title]);
        $existing_ebook = $existing_ebook_query->fetch(PDO::FETCH_ASSOC);

        if ($existing_ebook) {
            $error = "Un E-book avec ce titre existe déjà";
        } else {
            // Insertion des données dans la base de données
            $query = $db->prepare('INSERT INTO ebooks (title, description, ebook_image, ebook_file) VALUES (:title, :description, :ebook_image, :ebook_file)');
            $query->bindParam(':title', $title);
            $query->bindParam(':description', $description);
            $query->bindParam(':ebook_image', $imageName);
            $query->bindParam(':ebook_file', $ebookName);

            if ($query->execute()) {
                // Déplacer l'image et le fichier PDF téléchargés dans les dossiers cibles
                if (move_uploaded_file($imageTemp, $imageFolder) && move_uploaded_file($ebookTemp, $ebookFolder)) {
                    $success = "E-book publié avec succès";
                } else {
                    $error = "Échec du téléchargement des fichiers";
                }
            } else {
                $error = "Erreur lors de l'ajout de l'E-book";
            }
        }
    }
}
?>


