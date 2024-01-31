<?php session_start();?>

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
        <div class="card-wrapper">
            <ul class="card-list">
                <li class="card-list__item" data-card="0">
                    <div class="card">
                        <img class ="img1" src="images/hearts-33564_640.png">
                        <img class ="img2" src="images/hearts-33564_640.png">
                        <p class="cardtext">Everyday</p>
                        <img class ="img3" src="images/hearts-33564_640.png">
                        <img class ="img4" src="images/hearts-33564_640.png">
                    </div>
                </li>
                <li class="card-list__item" data-card="1">
                    <div class="card">
                        <img class ="img1" src="images/clubs-33561_640.png">
                        <img class ="img2" src="images/clubs-33561_640.png">
                        <p class="cardtext">I'm</p>
                        <img class ="img3" src="images/clubs-33561_640.png">
                        <img class ="img4" src="images/clubs-33561_640.png">
                    </div>
                </li>
                <li class="card-list__item" data-card="2">
                    <div class="card">
                        <img class ="img1" src="images/spade-48943_640.png">
                        <img class ="img2" src="images/spade-48943_640.png">
                        <p class="cardtext">shuffling</p>
                        <img class ="img3" src="images/spade-48943_640.png">
                        <img class ="img4" src="images/spade-48943_640.png">
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="tableWrapper">
        <div class="coffeeTable">
            <div class="coffee">
                <i class="fa-solid fa-mug-hot"></i>
            </div>
        </div>
        <div class="fileTable">
            <div class="file">
                <i class="fa-solid fa-file"></i>
            </div>
            <div class="containerFormulaire">
                <div class="formulaire">   
                    <form enctype="multipart/form-data" action="../C/getCSV.action.php" method="post">
                        <input class="file" name="file" type="file" /> 
                        <div class="button">
                            <input class="submit" name="submit" type="submit" value="valider" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="casino" >
        <button class="chip btn-shuffle" style="background-color: #850606">
            <span>Shuffle</span>
        </button>
    </div>

<script src="script/script.js"></script>
</body>
</html>