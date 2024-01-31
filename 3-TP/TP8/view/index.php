<?php
/*
login and persistant session
Author  @Abdelkarim
*/

@session_start();
if ($_SESSION["TokenGrant"]!="TokenGranted"){
    header('Location: ../view/login.php');
    exit();
}


include_once "../controller/readStats.action.php";
include_once "../controller/readWeather.action.php";
?>
<!DOCTYPE html>
<!--
AFFICHAGE DU TABLEAU made by @Dylan
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/3f8f1bd356.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/adminpanel.css">
    <link rel="icon" type="image/x-icon" href="../view/assets/jar-solid.ico">
</head>

<body>

<div class="complete-page">
    <?php include 'leftMenu.php'; ?>
    <div class="page-content">
        <nav>
             <h2 id="ancreTop"><a href="menu.php"><i class="fa-solid fa-bars"></i></a> Dashboard</h2>
            <ul>
                <li class="profil-menu"><a class="link-topmenu" href="#"><i class="log-out fa-solid fa-user-group"></i> <?php echo $_COOKIE["user_firstname"];?>&ensp;</a>
                  <ul class="sous">
                    <li><a class="link-submenu" href="resetPassword.php">Reset Password</a></li>
                    <li><a class="link-submenu" href="../controller/logout.action.php">Log Out</a></li>
                  </ul>
                </li>
            </ul>
        </nav>
        <!-- global stats in cards at the top of the page -->
        <hr>
            <div class="global-stats">
                <div class="stats">
                    <p class="icon-stats"><i class="fa-solid fa-euro-sign"></i></p>
                        <div>
                            <h4 class="stats-title">Total unpaid debts</h4>
                            <p class="stats-number"><?= $totalUnpaidDebts; ?>€</p>
                        </div>
                    </div>
                <div class="stats">
                    <p class="icon-stats"><i class="fa-solid fa-calculator"></i></p>
                        <div>
                            <h4 class="stats-title">Total insult said</h4>
                            <p class="stats-number"><?= $totalInsult; ?></p>
                        </div>
                </div>
                <div class="stats">
                    <p class="icon-stats"><i class="fa-solid fa-circle-check"></i></p>
                        <div>
                    <h4 class="stats-title">MRP <strong class="legend">(most respectful person)</strong></h4>
                    <p class="stats-number"> <?= $MRP; ?> </p>
                        </div>
                </div>
                <div class="stats image-coin">
                    <img id='random'/>
                </div>
            </div>
        <hr>

        <!-- more stats but smaller view -->

        <h3>Students List</h3>

        <div class="tiny-stats">

            <div>

                <p class="tiny-stats-data"><i class="fa-solid fa-user"></i> <?= $_SESSION["totalStudents"] = $totalStudents;?></p>


                <p class="tiny-stats-libelle">Total Students</p>

            </div>

            <div>

                <p class="tiny-stats-data"><i class="fa-solid fa-user"></i> <?= $_SESSION["lastInsult"] = $lastInsult;?></p>


                <p class="tiny-stats-libelle">Last infraction checked</p>

            </div>
            <div>
                <p class="tiny-stats-data"><i class="fa-solid fa-cloud"></i> <?= "$cityName : {$temperature}°C | {$windSpeed}km/h | {$probabilityOfRain}%";?></p>
                                    <!-- statique à modifier en dynamique -->
                <p class="tiny-stats-libelle"><?= "Weather, wind and raining chances";?></p>
            </div>

        </div>






        <?php
        include_once "../controller/readUsers.action.php";
        ?>

        <!-- table : read users from database -->
        <hr class="before-form">
        <div class="table-container">
        <table>
        <thead>
            <tr>
                <th class="id-column">ID</th>
                <th>Name</th>
                <th>Firstname</th>
                <th>Mail</th>
                <th>Phone</th>
                <th>Total Debt</th>
                <th>Add Penality</th>
                <th>Add Delay</th>
                <!-- <th>Delete</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION["allUsers"] as $user) { ?>
                <tr>
                    <form action="../controller/updateUser.action.php" method="POST">
                        <input name="user_ID" type="hidden" value="<?= $user->getUser_ID() ?>" />
                        <td class="id-column td-id">#<?php echo $user->getUser_ID() ?></td>
                        <td><input class="modify-user" name="name" type="text" value="<?= $user->getName() ?>" /></td>
                        <td><input class="modify-user" name="firstname" type="text" value="<?= $user->getFirstname() ?>" /></td>
                        <td><input class="modify-user" name="mail" type="text" value="<?= $user->getMail() ?>" /></td>
                        <td><input class="modify-user" name="tel" type="text" value="<?= $user->getTel() ?>" /></td>
                        <td><?php echo DBManagement::totalToPay($user->getUser_ID()); ?></td>
                        <input class="hidden-submit" type="submit" style="display:none;">
                    </form>
                        <td class="select-infraction">
                            <form action='../controller/addPenality.action.php' method='POST' id="addPenalityForm">
                                <input type="hidden" name="user_ID" value="<?= $user->getUser_ID(); ?>">
                                <select class="select" name='penality' id='penality'>
                                    <option value="">Select Penality</option>
                                    <?php
                                    foreach ($_SESSION['penalities'] as $penality) {
                                        if ($penality->getPenalityType() !== "10mn delay" & $penality->getPenalityType() !== "5mn Slice") {
                                            echo "<option value='" . $penality->getPenalityType() . "'>" . $penality->getPenalityType() . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="submit" class="fa icon-action send" value='&#xf1d8'>
                            </form>
                        </td>
                        <td class="select-infraction">
                            <form action='../controller/addDelay.action.php' method='POST'>
                                <input type="hidden" name="user_ID" value="<?= $user->getUser_ID(); ?>">
                                <select class="select" name='delay' id='penality'>
                                    <option value="">Select Delay</option>
                                    <?php
                                    $delays = ['10mn', '15mn', '20mn', '25mn', '30mn', '35mn', '40mn', '45mn', '50mn', '55mn', '60mn'];

                                    foreach ($delays as $delay) {
                                        echo "<option value='$delay'>$delay</option>";
                                    }
                                    ?>
                                </select>
                                <input type="submit" class="fa icon-action send" value='&#xf1d8'>
                            </form>

                        </td>

                    <!-- <td>
                        <form action='../controller/deleteUser.action.php' method='POST'>
                            <input type='hidden' name='user_ID' value='<?php //echo $user->getUser_ID(); ?>'>
                            <input type='submit' class="fa icon-action delete" value='&#xf1f8'>
                        </form>
                    </td> -->
                </tr>
            <?php }
         ?>
        </tbody>
    </table>
    </div>


<div class="table-container-phone">
<!-- TELEPHONE -->
    <?php

    // foreach ($_SESSION["allUsers"] as $user) { ?>
    <div>
        <?php foreach ($_SESSION["allUsers"] as $user) { ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Firstname</th>
                    <th>Mail</th>
                    <th>Phone</th>
                    <th>Total Debt</th>
                    <th>Add Penality</th>
                    <th>Add Delay</th>
                    <!-- <th>Delete</th> -->
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <form action="../controller/updateUser.action.php" method="POST">
                            <input name="user_ID" type="hidden" value="<?= $user->getUser_ID() ?>" />
                            <td class="tel-td-id">#<?php echo $user->getUser_ID() ?></td>
                            <td><input class="modify-user" name="name" type="text" value="<?= $user->getName() ?>" /></td>
                            <td><input class="modify-user" name="firstname" type="text" value="<?= $user->getFirstname() ?>" /></td>
                            <td><input class="modify-user" name="mail" type="text" value="<?= $user->getMail() ?>" /></td>
                            <td><input class="modify-user" name="tel" type="text" value="<?= $user->getTel() ?>" /></td>
                            <td><?php echo DBManagement::totalToPay($user->getUser_ID()); ?></td>
                            <input class="hidden-submit" type="submit" style="display:none;">
                        </form>
                            <td>
                                <form action='../controller/addPenality.action.php' method='POST' id="addPenalityForm">
                                    <input type="hidden" name="user_ID" value="<?= $user->getUser_ID(); ?>">
                                    <select class="select" name='penality' id='penality'>
                                        <option value="">Select Penality</option>
                                        <?php
                                        foreach ($_SESSION['penalities'] as $penality) {
                                            if ($penality->getPenalityType()  !== "10mn delay" && $penality->getPenalityType()  !== "5mn Slice") {
                                                echo "<option value='" . $penality->getPenalityType()  . "'>" . $penality->getPenalityType() . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input type="submit" class="fa icon-action send" value='&#xf1d8'>
                                </form>
                                <p id="log"></p>
                            </td>
                            <td class="select-infraction">
                                <form action='../controller/addDelay.action.php' method='POST'>
                                    <input type="hidden" name="user_ID" value="<?= $user->getUser_ID(); ?>">
                                    <select class="select" name='delay' id='penality'>
                                        <option value="">Select Delay</option>
                                        <?php
                                        $delays = ['10mn', '15mn', '20mn', '25mn', '30mn', '35mn', '40mn', '45mn', '50mn', '55mn', '60mn'];

                                        foreach ($delays as $delay) {
                                            echo "<option value='$delay'>$delay</option>";
                                        }
                                        ?>
                                    </select>
                                    <input type="submit" class="fa icon-action send" value='&#xf1d8'>
                                </form>

                            </td>

                        <!-- <td>
                            <form action='../controller/deleteUser.action.php' method='POST'>
                                <input type='hidden' name='user_ID' value='<?php //echo $user->getUser_ID(); ?>'>
                                <input type='submit' class="fa icon-action delete" value='&#xf1f8'>
                            </form>
                        </td> -->
                    </tr>
                <?php }
            ?>
            </tbody>
        </table>

    </div>

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
