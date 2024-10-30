<?php 
    require_once('../controllers/add_photo.php');
    session_start();
    require('../database/db.php');
    require_once('../controllers/functions.php');
    notconnected();
    logout()
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une image</title>

    <!--css-->
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/admin.css">
    <link rel="stylesheet" href="../asset/css/product.css">

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
        <div class="first-bloc">
            <nav>
                <a class="activ" href="index.php">
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
                <a  href="E-books.php">
                    <i class="bi bi-book"></i>
                    <span>E-books</span>
                </a>
                 <form class="button" action="" method="post">
                    <button  name="logout" style="font-size: 1rem;">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Se Deconnecter</span>
                    </button>
                </form>
            </nav>
        </div>
        <div class="second-bloc">
            <div class="formulaire-form">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Ajouter une image</h3>

                    <p style="text-align: left;margin-top: 10px;">Ajouter une photo dans la gallerie</p>
                    <div class="all-inputs">
                        <input type="file" name="uploadfile">
                    </div>
                    <div class="submit">
                        <input name="add" type="submit" value="Sauvegarder">
                    </div>
                    <p style="color: red;"><?=$error?></p>
                    <p style="color: green;"><?=$success?></p>

                </form>
            </div>
        </div>
    </section>
    <script src="../asset/javascript/app.js"></script>
</body>

</html>