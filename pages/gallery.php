<?php
    require_once('../database/db.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallérie</title>

    <!--css-->
    <link rel="stylesheet" href="../asset/css/typography.css">
    <link rel="stylesheet" href="../asset/css/gallery.css">
    <link rel="stylesheet" href="../asset/css/footer.css">
    <link rel="stylesheet" href="../asset/css/caroussel.css">
   
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

    <!--Header part-->
    <header >
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

    <!-- Gallery Section -->
    <section class="gallery">
        <div class="title">
            <div>
                <h4>gallerie</h4>
                <p></p>
            </div>
            <h2>Toute la gallerie</h2>
        </div>

        <div class="gallery-content">
            <div class="gallery-list">
                <ul>
                    <li class="active" data-filter="photo">Photos</li>
                    <li data-filter="video">vidéos</li>
                </ul>
            </div>
            <div class="all-gallery">
                <div class="gallery-item photo">
                    <i class="bi bi-chevron-left" id="left-arrow"></i>
                    <div class="gallery-images" id="gallery-images">
                        <!-- photo gallery Item -->
                        <?php
                            $stmt = $db->prepare('SELECT * FROM gallery_photo');
                            $stmt->execute();
                            $photos = $stmt->fetchAll();
                            
                            if( empty($photos)){
                                ?><p>Aucune photo ajoutée dans la gallérie</p><?php
                            }else{
                                foreach($photos as $photo){
                                ?>
                                    <div class="prod-item">
                                        <p><img src="../asset/images/gallery/<?=$photo['photo']?>" alt=""></p>
                                    </div>
                                <?php
                                }
                            }
                        ?>
                          
                    </div>
                    <i class="bi bi-chevron-right" id="right-arrow"></i>
                </div>
                <div class="gallery-item video">
                    <i class="bi bi-chevron-left" id="left-arrow"></i>
                    <div class="gallery-images" id="gallery-images">
                        <!-- Video Gallery Items -->
                        <?php
                            $stmt = $db->prepare('SELECT * FROM gallery_video');
                            $stmt->execute();
                            $videos = $stmt->fetchAll();
                            
                            if( empty($videos)){
                                ?><p>Aucune photo ajoutée dans la gallérie</p><?php
                            }else{
                                foreach($videos as $video){
                                    ?>
                                        <div class="prod-item">
                                            <video controls>
                                                <source src="../asset/videos/<?=$video['video']?>" >
                                            </video>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                    <i class="bi bi-chevron-right" id="right-arrow"></i>
                </div>
                

            </div>
        </div>
        
    </section>

    <script src="../asset/javascript/app.js"></script>
    <footer>
        <div class="writer">
            &copy;  <?= date("Y") ?> Holy Spirit Academia church. All rights reserved. <br> Developed by SoftCreatix 
        </div>
    </footer>
</body>
</html>