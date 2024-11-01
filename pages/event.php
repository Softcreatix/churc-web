<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evénements</title>

    <!--css-->
    <link rel="stylesheet" href="../asset/css/typography.css">
    <link rel="stylesheet" href="../asset/css/event.css">
    <link rel="stylesheet" href="../asset/css/footer.css">
   
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
                    <a href="about.php">À propos</a>
                    <a href="services.php">Services & Horaires</a>
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

    
   <!-- Events Section -->
    <section id="event" class="events">
        <div class="title">
            <div>
                <h4>Nos Événements</h4>
                <p></p>
            </div>
            <h2>Calendrier des Activités</h2>
        </div>
        <p>Découvrez nos événements uniques, études bibliques et d'autres activités marquantes tout au long de l'année.</p>
        <br>
        
        <!-- Evénements Uniques -->
        <h3>Événements Uniques</h3> <br>
        <div class="events-content">
            
            <div class="events-item">
                <h4>Anniversaire de Mission - Janvier</h4>
                <p>Chaque mois de janvier, nous commémorons notre anniversaire de mission avec des activités spéciales pour toute la communauté.</p>
            </div>
            <div class="events-item">
                <h4>Conférence de Pâques - NAGAHH</h4>
                <p>Durant les fêtes de Pâques, participez à notre conférence unique de 3 jours appelée NAGAHH, qui signifie « Splendeur Lumière ».</p>
            </div>
            <div class="events-item">
                <h4>Conférence de Pentecôte - DUMANIS</h4>
                <p>Pour la Pentecôte, nous organisons un séminaire conférence de sept jours dénommé DUMANIS, qui signifie « Puissance ».</p>
            </div>
        </div><br>



        <!-- Calendrier Événementiel -->
        <h3>Calendrier Événementiel</h3> <br>
        <div class="events-content">        
            <div class="events-item">
                <h4>Retraites Spirituelles Trimestrielles</h4>
                <p>Chaque fin de trimestre, joignez-vous à nous pour une retraite de 4 jours axée sur la vie d’un disciple et les disciplines de la consécration.</p>
            </div>
            <div class="events-item">
                <h4>Retraites Socio-Professionnelles</h4>
                <p>Chaque année, du 15 au 17 janvier, nous organisons une retraite de trois jours pour apprendre comment devenir un disciple productif dans ses entreprises et affaires.</p>
            </div>
            <div class="events-item">
                <h4>Service aux Nécessiteux</h4>
                <p>Chaque 14 septembre, nous mettons nos efforts ensemble pour venir en aide aux nécessiteux.</p>
            </div>
            <div class="events-item">
                <h4>Master-Class</h4>
                <p>Après chaque deux mois, participez à notre Master-Class de 4 jours dédiée à la connaissance de la Personne du Saint-Esprit. Un certificat de participation est remis à la fin. Limité à 50 participants.</p>
            </div>
            <div class="events-item">
                <h4>B'RESHEET - Célébration de l'Année</h4>
                <p>Tout le mois de janvier est dédié à la commémoration de notre existence, avec un événement clé durant la semaine du 6 au 12 janvier.</p>
            </div>
        </div><br>

        <!-- Études Bibliques -->
        <h3>Études Bibliques</h3><br>
        <div class="events-content">
            
            <div class="events-item">
                <h4>Études Bibliques Hebdomadaires</h4>
                <p>Rejoignez notre centre d’étude biblique tous les dimanches de 08h10 à 14h30 avec un temps de pause-café. C'est une voie pour approfondir la connaissance du Christ et l’observation de ses commandements.</p>
            </div>
        </div> <br>
    </section>


    <footer>
        <div class="writer">
            &copy;  <?= date("Y") ?> Holy Spirit Academia church. All rights reserved. <br> Developed by SoftCreatix 
        </div>
    </footer>
    <script src="../asset/javascript/app.js"></script>
</body>
</html>