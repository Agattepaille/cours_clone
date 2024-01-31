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

    <title>Game Rules</title>

    <script src="https://kit.fontawesome.com/3f8f1bd356.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./style/style.css">

    <link rel="stylesheet" href="./style/rules.css">    
    <link rel="icon" type="image/x-icon" href="../view/assets/jar-solid.ico">





</head>



<body>



<div class="complete-page">



    <?php include 'leftMenu.php'; ?>

    <div class="page-content">

        <nav>

            <h2 id="ancreTop"><a href="menu.php"><i class="fa-solid fa-bars"></i></a> Game Rules</h2>


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
        </nav>

        <hr>

        <div class="rules-margin">

            <div class=rulesWrapper>

            <div class="jar-container">

                <img src=".\assets\Dragon-pana2.png" alt="">

            </div>

            <h2>Conditions d'utilisation du Projet "Swear Jar"</h2>

            <p>Bienvenue dans l'univers fascinant du projet "Swear Jar" ! Avant de vous lancer dans cette aventure où la

                courtoisie règne et les retards sont traités avec une pointe d'humour, voici quelques guidelines à considérer

                avec un sourire.</p>

            <h3>1. Objectif du Projet :</h3>

            <p>Le projet "Swear Jar" aspire à être le Gandalf du respect, en encourageant un esprit de camaraderie et en

                déployant des stratégies magiques pour éradiquer les insultes et les retards. Parce que, soyons honnêtes, on

                mérite tous un peu de respect, non ?</p>

            <h3>2. Utilisation du Système de Pénalités :</h3>

            <p>Lorsque quelqu'un décide d'exprimer son talent artistique en matière d'insultes, ou qu'un autre défie

                l'espace-temps en arrivant en retard, le pouvoir est entre vos mains ! Cliquez sur le bouton magique pour

                ajouter une pénalité. Les montants des pénalités seront révélés ci-dessous, comme des récompenses à la fin d'un

                spectacle épique.</p>

            <h3>3. Respect et Tolérance : </h3>

            <p>Dans cet univers du "Swear Jar", nous vous encourageons à manier le pouvoir du respect avec la délicatesse d'un

                Jedi et à aborder les infractions avec la sagesse d'un Yoda. Après tout, la Force du Respect est forte en vous !

            </p>

            <h3>4. Confidentialité: </h3>

            <p>Toutes les confessions verbales et temporelles que vous partagez dans le cadre de notre projet resteront aussi

                confidentielles que les plans secrets de Batman. Votre identité secrète est en sécurité avec nous.</p>

            <h3>5. Responsabilité : </h3>

            <p>Tout superhéros a besoin d'un guide, et dans notre cas, c'est Moussa ! Il est là pour veiller à ce que l'ordre

                règne et que les contrevenants soient confrontés à leur destin. Soyez prêts à rendre des comptes, car Moussa ne

                plaisante pas avec le respect !</p>

            <h3>6. Modifications des conditions d'utilisation :</h3>

            <p>Comme dans tout bon scénario, notre histoire peut évoluer. Si le script change, soyez assurés que vous serez

                informés. Votre participation continue sera considérée comme l'acceptation d'une nouvelle saison dans cette

                série palpitante du respect.</p>

            <p class="conclusion">En vous lançant dans cette quête avec le projet "Swear Jar", vous déclarez avoir enfilé votre cape de respect et

                être prêt à affronter les aventures qui vous attendent. Merci de contribuer à faire de notre communauté un

                endroit où le respect et l'humour se côtoient harmonieusement ! 🌻</p>

            </div>

            <div class="table-container-rules">

                <table>

                    <thead>

                        <tr>

                            <th>Type of infraction</th>

                            <th>Price</th>

                            <th>Notes</th>

                        </tr>

                    </thead>

                    <?php foreach ($_SESSION["listPenality"] as $penality) { ?>

                        <tbody>

                            <tr>

                                <td> <?php echo $penality->getPenalityType(); ?> </td>

                                <td> <?php echo $penality->getPrice(); ?> €</td>

                                <td> <?php echo $penality->getNotes(); ?> </td>

                            </tr>

                        </tbody>

                    <?php } ?>

                </table>

            </div>

        </div>

        <div class="ancre">

            <a href="#ancreTop"><i class="fa-solid fa-arrow-up"></i></a>

        </div>

    </div>

</div>



<script src="scripts/leftMenuResponsive.js"></script>

</body>

</html>

