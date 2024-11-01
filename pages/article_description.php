<?php
    require_once('../database/db.php');
    if (isset($_GET['article']) && !empty($_GET['article'])) {
        $slug = $_GET['article'];

        $stmt = $db->prepare("SELECT * FROM articles WHERE article = ?");
        $stmt->execute([$slug]);
        $article = $stmt->fetch();

        if (!$slug) {
            echo '<script>alert("Article non trouvée");</script>';
            echo '<script>window.location.href="index.php";</script>';
            exit;
        }
    } else {
        echo '<script>alert("Article non trouvée");</script>';
        echo '<script>window.location.href="index.php";</script>';
        exit;
    }


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['title']) ?></title>

    <!--css-->
    <link rel="stylesheet" href="../asset/css/typography.css">
    <link rel="stylesheet" href="../asset/css/about.css">
    <link rel="stylesheet" href="../asset/css/footer.css">
   
    <!--Font family-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--Icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../asset/images/church_logo.png" type="image/png" sizes="16x16">
</head>

<body>

    <!--Header part-->
    <header>
        <div class="header-content">
            <div class="logo">
                <p><img src="../asset/images/church_logo.png" alt=""></p>
            </div>
            <div class="list">
                <div class="list-details">
                    <a class="home" href="../index.php">Accueil</a>
                    <a href="about.php               
">À propos</a>
                    <a href="services.php">Services & Horaires</a>
                    <a href="event.php">Evénements</a>
                    <a href="blog.php">Blog</a>
                    <a href="gallery.php">Gallérie</a>
                    <a href="contact.php">Contacts</a>
                    <a class="donate" style="color: white;" href="donations.html">Faire un don ❤</a>
                </div>
                <div class="our-menu">
                    <i class="bi bi-list-nested menu-icon"></i>
                    <i class="bi bi-x exit-icon"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- About Us Section -->
    <section id="about" class="about">
        <div>
            <h2><?= $article['title'] ?></h2>
        </div><br>
        <div class="about-content">
            <div class="about-text">
                <p>
                    <?= nl2br(($article['description'])) ?>
                </p>
            </div>
        </div>
    </section>

    <script src="../asset/javascript/app.js"></script>

</body>
</html>


