<?php
include_once "../controller/readPenality.action.php";

if ($_SESSION["TokenGrant"] != "TokenGranted") {
    // cacher les liens de déconnexions si l'utilisateur n'est pas connecté
    // made by @Dylan
    echo '<style>
            #menu-to-hide {
                display: none;
            }            
            #signin-link {
                display: block;
            }
          </style>';
} else {
    echo '<style>
            #signin-link {
                display: none;
            }
          </style>';
}
?>

<!DOCTYPE html>
<!--
Made by @Amelie
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <script src="https://kit.fontawesome.com/3f8f1bd356.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/contactUs.css">
    <link rel="stylesheet" href="./style/adminpanel.css">
    <link rel="icon" type="image/x-icon" href="../view/assets/jar-solid.ico">
    <!-- Leaflet style and script -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
</head>

<body>

<div class="complete-page">

    <?php include 'leftMenu.php'; ?>
    <div class="page-content">
        <nav>
            <h2 id="ancreTop"><a href="leftMenu.php"><i class="fa-solid fa-bars"></i></a> Contact us</h2>
            <ul id="menu-to-hide">
                <li class="profil-menu">
                    <a class="link-topmenu" href="#">
                        <i class="log-out fa-solid fa-user-group"></i> <?php echo $_COOKIE["user_firstname"];?>&ensp;
                    </a>
                    <ul class="sous">
                        <li><a class="link-submenu" href="resetPassword.php">Reset Password</a></li>
                        <li><a class="link-submenu" href="../controller/logout.action.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <a id="signin-link" href="../view/login.php">Sign in</a>
            </ul>
        </nav>
        <hr class="hr-space">


            <div class="rules-margin">
                <div class='contact-us'>
                    <img class="contact-img" src="./assets/contactimg.png" alt="">
                    <!-- Contact form-->
                    <form id ="form" class="topBefore" action="../controller/sendMailContactUs.action.php" method="post">
                        <h3>Contact Us</h3>
                        <input class="champ" id="name" name="name" type="text" placeholder="Name">
                        <input class="champ" id="email" name="mail" type="text" placeholder="Email">
                        <textarea class="champ" id="message" type="text" placeholder="Message" maxlength="250"></textarea>
                        <input id="submit" type="submit" value="Send mail">
                    </form>
                </div>
                <div class='about-us'>    
                    <fieldset>
                    <h3>About Us</h3>
                    <p class="about">Bienvenue sur Swear Jar ! Nous sommes Dylan, Abdel-Karim, Lorena et Amélie, élèves de la formation
                        Développeur Web et Web Mobile (DWWM) de l'AFPA de Roubaix. Ce projet, façonné par nos soins, vise à promouvoir le respect et la camaraderie.
                        Ensemble, en tant qu'apprenants passionnés de la DWWM, nous avons créé un espace où les insultes et les retards
                        sont traités avec justice, faisant de Swear Jar un lieu où la courtoisie règne en maître. 🌟</p>
                    <h3>Where to find us</h3>
                        <div id="map"></div>
                    </fieldset>
                    <img class="contact-img" src="./assets/logoafpa.png" alt="">
                </div>
            </div>


        <div class="ancre">
            <a href="#ancreTop"><i class="fa-solid fa-arrow-up"></i></a>
        </div>
    </div>
</div>

<script src="scripts/map.js"></script>
<script src="scripts/leftMenuResponsive.js"></script>
</body>
</html>
