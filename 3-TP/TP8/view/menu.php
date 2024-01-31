<?php
//made by @Dylan 
session_start();

if ($_SESSION["TokenGrant"] == "TokenGranted") {
    $links = [
        'index.php' => '<i class="fa-solid fa-layer-group"> </i> Dashboard',
        'personalHistory.php' => '<i class="fa-solid fa-chart-pie"> </i> Personal History',
        'topSnitches.php' => '<i class="fa-solid fa-trophy"> </i> Top Ten Snitches',
        'rules.php' => '<i class="fa-solid fa-book-open"> </i> Game Rules',
        'contactUs.php' => '<i class="fa-solid fa-envelope"> </i> </i> Contact Us'
    ];
} else {
    $links = ['rules.php' => '<i class="fa-solid fa-book-open"> </i> Game Rules'];
}

?>

<head>
    <link rel="stylesheet" href="./style/style.css">
    <script src="scripts/lastClickedNav.js"></script>    
    <link rel="icon" type="image/x-icon" href="../view/assets/jar-solid.ico">
    <script src="https://kit.fontawesome.com/3f8f1bd356.js" crossorigin="anonymous"></script>
</head>


<body>
<div class="panel">
    <h1><i class="fa-solid fa-jar"></i> Swear <strong>Jar</strong></h1>
    <hr>
    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    foreach ($links as $link => $label) {
        $class = ($currentPage === $link) ? 'clicked' : '';
        echo "<a href='$link' class='$class'>$label</a>";
    }

    ?>

</div>

</body>