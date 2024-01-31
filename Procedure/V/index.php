<?php session_start();
include_once "../C/readEmployees.action.php";?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700">
    <script src="https://kit.fontawesome.com/ac52aaf820.js" crossorigin="anonymous"></script>
</head>

<body>
<h1 id="ancreTop">
  <img class ="img1" src="Image1.png">Read, Create, Update, Delete with Stored Procedures
  <a href="#ancreDown"><i class="fa-solid fa-arrow-down"></i></a>
</h1>

<table class="rwd-table insert">
  <!-- Line to insert a new employee -->
  <tr>
    <td colspan="1"></td> <!-- Colonne vide pour les données -->
    <td>
      <form action='../C/insertEmployees.action.php' method='post'>
        <label for='firstname'>Firstname:</label>
        <input class='textfield' type='text' name='firstname' required>
    </td>
    <td>
      <label for='surname'>Surname:</label>
      <input class='textfield' type='text' name='surname' required>
    </td>
    <td>
        <label for='job'>Job:</label>
        <input class='textfield' type='text' name='job' required>
    </td>
    <td>
    </td>
    <td>
      <label for='city'>City:</label>
      <input class='textfield' type='text' name='city' required>
    </td>
    <td>
      <input type='submit' value='Insert'>
    </td>
    </form>
  </tr>
</table>

<table class="rwd-table">
  <tr>
    <th>ID</th>
    <th>Firstname</th>
    <th>Surname</th>
    <th>Job</th>
    <th></th>
    <th>City</th>
    <th></th>
    <th>Salary</th>
  </tr>
  
  <?php
        // Récupération du tableau depuis la session
        //$employees = $_SESSION["employees"];
        
        // Boucle pour parcourir le tableau et afficher les données
      foreach ($employees as $employee) {
            echo "<tr>";
            echo "<td>" . $employee["ID"] . "</td>"; // ID
            echo "<td>" . $employee["FIRSTNAME"] . "</td>"; // Prénom
            echo "<td>" . $employee["SURNAME"] . "</td>"; // Nom de famille
            echo "<td>" . $employee["JOB"] . "</td>"; // Job

            echo "<td>";
            echo "<form action='../C/updateJobEmployee.action.php' method='POST'>";
            echo "<input type='hidden' name='ID' value='" . $employee["ID"]. "'/>";
            echo "<input class='textfield' name='JOB' type='text' required />";
            echo "<input type='submit' value='Update'/>";
            echo "</form>";
            echo "</td>";

            echo "<td>" . $employee["CITY"] . "</td>"; // Ville

            echo "<td>";
            echo "<form action='../C/updateCityEmployee.action.php' method='POST'>";
            echo "<input type='hidden' name='ID' value='" . $employee["ID"]. "'/>";
            echo "<input class='textfield' name='CITY' type='text' required />";
            echo "<input type='submit' value='Update'/>";
            echo "</form>";
            echo "</td>";

            echo "<td>" . $employee["SALARY"] . "</td>"; // Salaire

            echo "<td>";
            echo "<form action='../C/deleteEmployee.action.php' method='POST'>";
            echo "<input type='hidden' name='ID' value='" . $employee["ID"] . "'>";
            echo "<input type='submit' value='Delete'>";
            echo "</form>";
            echo "</td>";

            echo "</tr>";
         }
        ?>
</table>

<div class="total1">
  <h2 id="ancreDown">Total of employees : <?php echo $totalEmployees ;?></h2>
</div>

<div class="total2">
  <h2>
    <a href="#ancreTop"><i class="fa-solid fa-arrow-up"></i></a>
    Number of employees outside of Lille : <?php echo $totalEmployeesOut ;?>
  </h2>
</div>

</body>
</html>

