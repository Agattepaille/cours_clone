<?php

/*

login and persistant session

Author  @Abdelkarim

*/

session_start();



if ($_SESSION["TokenGrant"]!="TokenGranted"){

    header('Location: ../view/login.php');

    exit();

}

$rank = 1;

include_once "../controller/readStats.action.php";
include_once "../controller/readSnitches.action.php";

?>



<!DOCTYPE html>

<!--

AFFICHAGE DU TABLEAU made by @Dylan

-->

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Top 10 Snitches</title>

    <script src="https://kit.fontawesome.com/3f8f1bd356.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./style/adminpanel.css">

    <link rel="stylesheet" href="./style/topSnitches.css">

    <link rel="stylesheet" href="./style/style.css">    
    <link rel="icon" type="image/x-icon" href="../view/assets/jar-solid.ico">

</head>

<body>



<div class="complete-page">



    <?php include 'leftMenu.php'; ?>

    <div class="page-content">

        <nav>

            <h2 id="ancreTop"><a href="menu.php"><i class="fa-solid fa-bars"></i></a> Top 10 Snitches</h2>

            <ul>
                <li class="profil-menu"><a class="link-topmenu" href="#"><i class="log-out fa-solid fa-user-group"></i> <?php echo $_COOKIE["user_firstname"];?>&ensp;</a>
                  <ul class="sous">
                    <li><a class="link-submenu" href="resetPassword.php">Reset Password</a></li>
                    <li><a class="link-submenu" href="../controller/logout.action.php">Log Out</a></li>
                  </ul>
                </li>
            </ul>
        </nav>

        <!-- global stats in card at the top of the page -->

        <hr>

            <div class="global-stats">

                <div class="stats">

                    <p class="icon-stats"><i class="fa-solid fa-euro-sign"></i></p>

                        <div>

                            <h4 class="stats-title">Best Snitch</h4>

                            <p class="stats-number"><?= $_SESSION["bestSnitch"]; ?></p>

                        </div>

                </div>

                <div class="stats">

                    <p class="icon-stats"><i class="fa-solid fa-calculator"></i></p>

                        <div>

                            <h4 class="stats-title">Total infraction by snitches</h4>

                            <p class="stats-number"><?= $_SESSION["totalinsultSnitches"]?></p>

                        </div>

                </div>

                <div class="stats">

                    <p class="icon-stats"><i class="fa-solid fa-circle-check"></i></p>

                        <div>

                            <h4 class="stats-title">MRP <strong class="legend">(most respectful person)</strong></h4>

                            <!-- statique à modifier en dynamique -->

                            <p class="stats-number"> <?= $MRP; ?> </p>

                        </div>

                </div>

                <div class="stats image-coin">

                    <img id='random'/>

                </div>

            </div>

        <hr>


 <!-- table : read snitches from database -->
 <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th class="id-column">Rank</th>
                        <th class="id-column-snitches">ID</th>
                        <th>Name</th>
                        <th>Firtsname</th>
                        <th>Mail</th>
                        <th>Phone</th>
                        <th>Total Debt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rank = 0; // Initialise le rang
                    $imageIndex = 0; // Initialise le rang
                    foreach ($_SESSION["snitches"] as $snitch) { ?>
                            <input name="user_ID" type="hidden" value="<?= $snitch->getUser_ID() ?>" />
                                <tr>
                                <td class="id-column td-id">
                                    <?php $imageIndex++; ?>
                                    <?php $rank++; ?>
                                        <?php if ($imageIndex == 1): ?>
                                            <img src="assets/goldmedal.png" alt="Image1" width = 16px >
                                        <?php elseif ($imageIndex == 2): ?>
                                            <img src="assets/silvermedal.png" alt="Image2" width = 16px>
                                        <?php elseif ($imageIndex == 3): ?>
                                            <img src="assets/bronzemedal.png" alt="Image3" width = 16px>
                                        <?php elseif ($imageIndex >= 4):  ?>
                                            <?= $rank; ?>
                                        <?php endif; ?>
                                </td>
                                    <td class="id-column-snitches">#<?php echo $snitch->getUser_ID()?></td>
                                    <td><p><?php echo $snitch->getName()?></p></td>
                                    <td><p><?php echo $snitch->getFirstname()?></p></td>
                                    <td><p><?php echo $snitch->getMail()?></p></td>
                                    <td><p><?php echo $snitch->getTel()?></p></td>
                                    <td><p><?php echo DBManagement::totalToPay($snitch->getUser_ID()); ?></p></td>
                                </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <div class="table-container-phone">
                <?php
                $rank = 0; // Initialise le rang
                $imageIndex = 0; // Initialise le rang
                foreach ($_SESSION["snitches"] as $snitch) { ?>
                    <table>
                        <thead>
                            <tr>
                                <th class="id-column">Rank</th>
                                <th class="id-column-snitches">ID</th>
                                <th>Name</th>
                                <th>Firtsname</th>
                                <th>Mail</th>
                                <th>Phone</th>
                                <th>Total Debt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <input name="user_ID" type="hidden" value="<?= $snitch->getUser_ID()  ?>" />
                            <tr>
                            <td class="id-column td-id">
                                <?php $imageIndex++; ?>
                                <?php $rank++; ?>
                                    <?php if ($imageIndex == 1): ?>
                                        <img src="assets/goldmedal.png" alt="Image1" width = 16px >
                                    <?php elseif ($imageIndex == 2): ?>
                                        <img src="assets/silvermedal.png" alt="Image2" width = 16px>
                                    <?php elseif ($imageIndex == 3): ?>
                                        <img src="assets/bronzemedal.png" alt="Image3" width = 16px>
                                    <?php elseif ($imageIndex >= 4):  ?>
                                        <?= $rank; ?>
                                    <?php endif; ?>
                            </td>
                                <td class="id-column-snitches">#<?php echo $snitch->getUser_ID() ?></td>
                                <td><p><?php echo $snitch->getName()?></p></td>
                                <td><p><?php echo $snitch->getFirstname()?></p></td>
                                <td><p><?php echo $snitch->getMail()?></p></td>
                                <td><p><?php echo $snitch->getTel()?></p></td>
                                <td><p><?php echo DBManagement::totalToPay($snitch->getUser_ID()); ?></p></td>

                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
        </div>

        <div class="ancre">
            <a href="#ancreTop"><i class="fa-solid fa-arrow-up"></i></a>
        </div>
    </div>
</div>

    <script src="scripts/leftMenuResponsive.js"></script>
    <script src="scripts/randomImage.js"></script>

</body>
</html>