<?php
// Inclure le fichier de connexion à la base de données
include('../database/db.php');

// Initialiser les variables pour les messages de succès et d'erreur
$error = "";
$success = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer et nettoyer les données d'entrée
    $ebook_title = htmlspecialchars($_POST['ebook_title']);
    $ebook_description = htmlspecialchars($_POST['ebook_description']);

    // Obtenir l'ID du livre (ou ebook_id) depuis l'URL
    if (isset($_GET['id'])) {
        $ebook_id = intval($_GET['id']);  // Assurer qu'il s'agit d'un entier
    } else {
        $error = "Erreur : Aucun ID de livre électronique fourni.";
    }

    // Procéder uniquement s'il n'y a pas d'erreur
    if (empty($error)) {
        // Gérer le téléchargement de l'image du livre électronique
        $ebook_image = $_FILES['ebook_image']['name'];
        $image_tmp_name = $_FILES['ebook_image']['tmp_name'];
        $image_folder = "../pages/ebook_images/" . $ebook_image;

        // Gérer le téléchargement du fichier du livre électronique
        $ebook_file = $_FILES['ebook_file']['name'];
        $file_tmp_name = $_FILES['ebook_file']['tmp_name'];
        $file_folder = "../pages/ebooks/" . $ebook_file;

        // Préparer la requête pour mettre à jour les détails du livre électronique dans la base de données
        try {
            // Préparer la requête SQL de mise à jour
            $sql = "UPDATE ebooks 
                    SET title = :title, description = :description";

            // Ajouter le chemin de l'image à la requête si une nouvelle image est téléchargée
            if (!empty($ebook_image)) {
                $sql .= ", ebook_image = :ebook_image";
            }

            // Ajouter le chemin du fichier du livre électronique à la requête si un nouveau fichier est téléchargé
            if (!empty($ebook_file)) {
                $sql .= ", ebook_file = :ebook_file";
            }

            $sql .= " WHERE id = :id";  

            // Préparer la déclaration
            $stmt = $db->prepare($sql);

            // Lier les paramètres
            $stmt->bindParam(':title', $ebook_title);
            $stmt->bindParam(':description', $ebook_description);

            // Lier uniquement le nom du fichier, pas le chemin complet
            if (!empty($ebook_image)) {
                $stmt->bindParam(':ebook_image', $ebook_image);
            }
            if (!empty($ebook_file)) {
                $stmt->bindParam(':ebook_file', $ebook_file);
            }

            // Lier l'ebook_id depuis $_GET
            $stmt->bindParam(':id', $ebook_id);

            // Exécuter la mise à jour
            if ($stmt->execute()) {
                // Déplacer l'image et le fichier téléchargés vers les dossiers désignés
                if (!empty($ebook_image)) {
                    if (move_uploaded_file($image_tmp_name, $image_folder)) {
                        $success = "Image du livre électronique téléchargée avec succès.";
                    } else {
                        $error = "Échec du téléchargement de l'image du livre électronique.";
                    }
                }
                if (!empty($ebook_file)) {
                    if (move_uploaded_file($file_tmp_name, $file_folder)) {
                        $success .= " Fichier du livre électronique téléchargé avec succès.";
                    } else {
                        $error .= " Échec du téléchargement du fichier du livre électronique.";
                    }
                }

                // Définir un message de succès si aucune erreur ne s'est produite pendant le téléchargement
                if (empty($error)) {
                    $success = "Livre électronique mis à jour avec succès !";
                }
            } else {
                $error = "Échec de la mise à jour du livre électronique. Veuillez réessayer.";
            }
        } catch (PDOException $e) {
            $error = "Erreur : " . $e->getMessage();
        }
    }
}
?>
