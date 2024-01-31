<?php
/*
login and persistant session
persistant cookies
Author  @Abdelkarim
*/
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();
include_once "../controller/readPersonalHistory.action.php";
if ($_SESSION["TokenGrant"]!="TokenGranted"){
    header('Location: ../view/login.php');
    exit();
}
include_once "../controller/readStats.action.php";


?>



<!DOCTYPE html>
<!-- CSS AND HTML DU TABLEAU
Made by @Dylan-->
<!-- AFFICHAGE DE LA PAGE
Made by @Lorena  -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3f8f1bd356.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/personalHistory.css">
    <link rel="stylesheet" href="./style/adminpanel.css">
    <link rel="icon" type="image/x-icon" href="../view/assets/jar-solid.ico">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>
    <title>Personal History</title>
</head>
<body>

    <div class="complete-page">
        <?php include 'leftMenu.php'; ?>
        <div class="page-content">
            <nav>
                <h2 id="ancreTop"><a href="menu.php"><i class="fa-solid fa-bars"></i></a> Personal History</h2>
                <ul>
                    <li class="profil-menu"><a class="link-topmenu" href="#"><i class="log-out fa-solid fa-user-group"></i> <?php echo $_COOKIE["user_firstname"];?>&ensp;</a>
                    <ul class="sous">
                        <li><a class="link-submenu" href="resetPassword.php">Reset Password</a></li>
                        <li><a class="link-submenu" href="../controller/logout.action.php">Log Out</a></li>
                    </ul>
                    </li>
                </ul>
            </nav>
       <!-- user welcome -->
       <hr>


        <!-- global stats in cards at the top of the page -->

        <div class="global-stats">
            <div class="stats">
                <p class="icon-stats"><i class="fa-solid fa-euro-sign"></i></p>
                    <div>
                        <h4 class="stats-title">Personal unpaid debt</h4>
                        <p class="stats-number"><?= $personalUnpaidDebt;?>€</p>
                    </div>
                </div>
            <div class="stats">
                <p class="icon-stats"><i class="fa-solid fa-calculator"></i></p>
                    <div>
                        <h4 class="stats-title">Total insults said</h4>
                        <p class="stats-number"><?= $totalPersonalInsult; ?></p>
                    </div>
            </div>
            <div class="stats">
                <p class="icon-stats"><i class="fa-solid fa-circle-check"></i></p>
                    <div>
                <h4 class="stats-title">How far from MRP</h4>
                <!-- statique à modifier en dynamique -->
                <p class="stats-number"><?= $howFarFromMRP; ?> infractions</p>
                    </div>
            </div>
                <div class="stats image-coin">
                    <img id='random'/>
                </div>
        </div>

<!-- table : read users from database -->
<hr>
    <h1 class="welcome">Welcome,<br /><?php echo $_COOKIE["user_firstname"]; echo " ".$_COOKIE["user_name"]?></h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Infraction title</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>Delay count</th>
                        <th>Insult count</th>
                        <th>Aggressive<br/>behavior count</th>
                        <th>Inadequate<br />behavior count</th>
                        <th>Snitched by</th>
                        <th>Payment status</th>
                        <th>Change payment</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($_SESSION["listInfractions"] as $infraction) { ?>
                    <tr>
                        <td> <?php echo $infraction->getPenalityType();?> </td>
                        <td> <?php echo $infraction->getFormattedDate();?> </td>
                        <td> <?php echo $infraction->getTotalToPay();?> €</td>
                        <td> <?php echo $infraction->getDelayCount();?> </td>
                        <td> <?php echo $infraction->getInsultCount();?> </td>
                        <td> <?php echo $infraction->getAgressiveBehavior();?> </td>
                        <td> <?php echo $infraction->getInadequateBehavior();?> </td>
                        <td> <?php echo $infraction->getSnitchName();?> </td>
                        <td class="<?php echo ($infraction->getPaymentStatus() == 1) ? 'paid' : 'unpaid'; ?>">
                            <?php echo ($infraction->getPaymentStatus() == 1) ? 'Paid' : 'Unpaid';?>
                        </td>
                        <td>
                            <div class ="changePaymentStatus" >
                                <form action='../controller/changePaymentStatus.action.php' method='POST'>
                                    <input type="hidden" name="infraction_ID" value="<?php echo $infraction->getInfraction_ID();?>">
                                    <input type="hidden" name="user_ID" value="<?php echo $infraction->getUser_ID();?>">
                                    <input type="submit" name="submitPayment" class="fa icon-action pay" value=''>
                                    <input type="submit" name="cancelPayment" class="fa icon-action cancel" value=''>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php }?>
                </tbody>

            </table>
        </div>

        <div class="table-container-phone">
        <div>
            <table>
                <thead>
                    <tr>
                        <?php foreach ($_SESSION["listInfractions"] as $infraction) { ?>
                        <th class="infraction-title">Infraction title</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>Delay count</th>
                        <th>Insult count</th>
                        <th>Agg. behavior count</th>
                        <th>Ina. behavior count</th>
                        <th>Snitched by</th>
                        <th>Payment status</th>
                        <th class="changePaymentStatus">Change payment</th> <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($_SESSION["listInfractions"] as $infraction) { ?>
                        <td class="infraction-title-libelle"> <?php echo $infraction->getPenalityType();?> </td>
                        <td> <?php echo $infraction->getFormattedDate();?> </td>
                        <td> <?php echo $infraction->getTotalToPay();?> €</td>
                        <td> <?php echo $infraction->getDelayCount();?> </td>
                        <td> <?php echo $infraction->getInsultCount();?> </td>
                        <td> <?php echo $infraction->getAgressiveBehavior();?> </td>
                        <td> <?php echo $infraction->getInadequateBehavior();?> </td>
                        <td> <?php echo $infraction->getSnitchName();?> </td>
                        <td class="<?php echo ($infraction->getPaymentStatus() == 1) ? 'paid' : 'unpaid'; ?>">
                            <?php echo ($infraction->getPaymentStatus() == 1) ? 'Paid' : 'Unpaid';?>
                        </td>
                        <td>
                            <div class ="changePaymentStatus" >
                                <form action='../controller/changePaymentStatus.action.php' method='POST'>
                                    <input type="hidden" name="infraction_ID" value="<?php echo $infraction->getInfraction_ID();?>">
                                    <input type="hidden" name="user_ID" value="<?php echo $infraction->getUser_ID();?>">
                                    <input type="submit" name="submitPayment" class="fa icon-action pay" value=''>
                                    <input type="submit" name="cancelPayment" class="fa icon-action cancel" value=''>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
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
