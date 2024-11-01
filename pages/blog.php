<?php 
     require_once('../database/db.php');
     
     // Fetch articles from the database
     $stmt = $db->prepare('SELECT SUBSTRING(description, 1, 160) as short_desc, title, article_id, published_date, article_image,article FROM articles ORDER BY published_date DESC');
     $stmt->execute();
     $articles = $stmt->fetchAll();

     // Check if there are no articles to apply the 'empty' class
     $blogClass = empty($articles) ? 'empty' : '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../asset/css/typography.css">
    <link rel="stylesheet" href="../asset/css/blog.css">
    <link rel="stylesheet" href="../asset/css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
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
                    <a href="about.php">À propos</a>
                    <a href="services.php">Services & Horaires</a>
                    <a href="event.php">Evénements</a>
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

    <!-- Blog Section -->
    <section id="blog" class="blog <?= $blogClass; ?>">
        <div class="title">
            <div>
                <h4>Blog</h4>
                <p></p>
            </div>
            <h2>Articles Récents</h2>
        </div>
        <p>Découvrez nos articles sur des sujets spirituels, les dernières nouvelles de la communauté.</p>
        <br>
        <div  class="blog-content">
        <?php
            if (empty($articles)) {
                echo '<p>Aucun article publié sur le site !!</p>';
            } else {
                foreach ($articles as $article) {
                    $publishedDate = new DateTime($article['published_date']);
                    $formattedDate = $publishedDate->format('d.m.Y');
                    ?>
                    <div class="blog-card">
                        <img src="../pages/article_images/<?php echo htmlspecialchars($article['article_image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="blog-image">
                        <div class="blog-details">
                            <h4><?=$article['title']?></h4>
                            <p class="blog-date">Publié le : <?= $formattedDate ?></p>
                            <p><?= nl2br($article['short_desc']) ?>...</p>
                            <div class="blog-links">
                                <a  class="btn btn-read" href="article_description.php?article=<?php echo $article['article']; ?>" >Lire plus</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
        </div>
      
    </section>

    <footer>
        <div class="writer">
            &copy; <?= date("Y") ?> Holy Spirit Academia church. All rights reserved. <br> Developed by SoftCreatix 
        </div>
    </footer>
    <script src="../asset/javascript/app.js"></script>
</body>
</html>
