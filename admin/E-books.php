<?php
 require_once('../database/db.php');
require_once('../controllers/functions.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-books</title>

    <!--css-->
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/admin.css">

    <!--Font family-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--Icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="icon" href="../asset/images/church_logo.png" type="image/png" sizes="16x16">
</head>

<body>

    <!-- Admin header -->
    <header class="header-admin">
        <div>
            <h2>Tableau de Bord</h2>
        </div>
        <div class="admin-menu">
            <i class="bi bi-list menu-icon-admin"></i>
            <i class="bi bi-x exit-icon-admin"></i>
        </div>
    </header>

    <section class="admin-section">
        <div class="first-bloc" >
            <nav>
                <a href="index.php">
                    <i class="bi bi-clipboard-pulse"></i>
                    <span>Tableau de Bord</span>
                </a>
                <a  href="articles.php">
                    <i class="bi bi-bookmark-star"></i>
                    <span>Articles</span>
                </a>
                <a  href="Sermons.php">
                    <i class="bi bi-journal-richtext"></i>
                    <span>Sermons</span>
                </a>

                <a class="activ" href="E-books.php">
                    <i class="bi bi-book"></i>
                    <span>E-books</span>
                </a>
                <form class="button" action="" method="post">
                    <button style="font-size: 1rem;">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Se Deconnecter</span>
                    </button>
                </form>
            </nav>
        </div>

        <div class="second-bloc">
        <div class="add-image" style="margin-left: auto; margin-right: auto; margin-bottom: 20px;">
            <a href="addE-book.php">Ajouter un E-book</a>
        </div>

        <?php
            $stmt = $db->prepare('SELECT SUBSTRING(description, 1, 150) as short_desc, title, id, ebook_image FROM ebooks');
            $stmt->execute();
            $ebooks = $stmt->fetchAll();

            if (empty($ebooks)) {
                // Afficher le message dans second-bloc si aucun ebook n'est trouvé
                echo '<p style="justify-content: center; display: flex;">Aucun ebook publié sur le site</p>';
            } else {
                echo '<div class="blog-details">';
                foreach ($ebooks as $ebook) {
                    ?>
                    <div class="blog-item">
                        <p><img src="../pages/ebook_images/<?= $ebook['ebook_image'] ?>" alt="" width="100%"></p>
                        <h3><?= $ebook['title'] ?></h3>
                        <p><?= $ebook['short_desc'] ?></p>
                        <div>
                            <a href="editE-book.php?id=<?= $ebook['id'] ?>"><i class="bi bi-pen"></i></a>
                            <button book_id="<?= $ebook['id'] ?>" class="delete"><i class="bi bi-trash3"></i></button>
                        </div>
                    </div>
                    <?php
                }
                echo '</div>'; 
            }
        ?>
    </div>
    <?=popup_delete_ebook()?>
    </section>
    <script src="../asset/javascript/app.js"></script>
    <script src="../asset/javascript/delete_ebook.js"></script>
</body>

</html>