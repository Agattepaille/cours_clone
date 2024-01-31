<?php session_start()?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Load CSS style sheets -->
    <link rel="stylesheet" href="style/boilerplate.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_cards.css">
    <link rel="stylesheet" href="style/style_btnShuffle.css">
    <link rel="stylesheet" href="style/style_forms.css">
<!-- Load CSS style sheets -->
    <script src="https://kit.fontawesome.com/ac52aaf820.js" crossorigin="anonymous"></script>
    <link
		href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">        
</head>

<body>
    <div class="island1">
        <div class="desk1">
            <i class="fa-solid fa-user"></i>
            <p class="place">1</p>
        </div>
        <div class="desk2">
            <i class="fa-solid fa-user"></i>
            <p class="place">2</p>
        </div>
        <div class="desk3">
            <i class="fa-solid fa-user"></i>
            <p class="place">3</p>
        </div>
        <div class="desk4">
            <i class="fa-solid fa-user"></i>
            <p class="place">4</p>
        </div>
    </div>

    <div class="island2">
        <div class="desk1">
            <i class="fa-solid fa-user"></i>
            <p class="place">5</p>
        </div>
        <div class="desk2">
            <i class="fa-solid fa-user"></i>
            <p class="place">6</p>
        </div>
        <div class="desk3">
            <i class="fa-solid fa-user"></i>
            <p class="place">7</p>
        </div>
        <div class="desk4">
            <i class="fa-solid fa-user"></i>
            <p class="place">8</p>          
        </div>
    </div>

    <div class="island3">
        <div class=desk1>
            <i class="fa-solid fa-user"></i>
            <p class="place">9</p>
        </div>
        <div class="desk2">
            <i class="fa-solid fa-user"></i>
            <p class="place">10</p>
        </div>
        <div class="desk3">
            <i class="fa-solid fa-user"></i>
            <p class="place">11</p>
        </div>
        <div class="desk4">
            <i class="fa-solid fa-user"></i>
            <p class="place">12</p>
        </div>
    </div>

    <div class="island4">
        <div class="desk1">
            <i class="fa-solid fa-user"></i>
            <p class="place">13</p>
        </div>
        <div class="desk2">
            <i class="fa-solid fa-user"></i>
            <p class="place">14</p>
        </div>
        <div class="desk3">
            <i class="fa-solid fa-user"></i>
            <p class="place">15</p>
        </div>
        <div class=desk4>
            <i class="fa-solid fa-user"></i>
            <p class="place">16</p>
        </div>
    </div>

    <div class="islandMoussa">
        <p>Moussa's desk</p>
        <i class="fa-solid fa-user"></i>
        <div class="containerForm read">
            <div class="form">   
                <form action="../C/readDBStudents.action.php" method="POST">
                    <p>
                        <label for="ID">Voir les étudiants</label>
                    </p>
                    <p>
                        <input class="submit" type="submit" value="GO" />
                    </p>
                </form>
            </div>
        </div>
    </div>

    <div class= "tableWrapper">
        <div class="coffeeTable">
            <div class="coffee">
                <i class="fa-solid fa-mug-hot"></i>
            </div>
        </div>
    </div>

<script src="script/script.js"></script>
</body>
</html>