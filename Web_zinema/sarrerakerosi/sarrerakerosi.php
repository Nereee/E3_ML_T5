<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_elorrietazinema";

// Konexioa sortu
$mysqli = new mysqli($servername, $username, $password, $db);

// Konexioa egiaztatu
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }  

// Konexioa itxi
//$mysqli->close();

?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarrerak</title>
    <link rel="stylesheet" href="sarrerakerosi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body onload= "datuakkargatu()">
    <a href="../index.html" id="atzera"><img src="../img/fletxa.png" alt="fletxa"></a>
    <form action="sarrerakerosi.php" method = "get" id = "sarrerakerosi" name = "sarrerakerosi">
        <h1 class="title">Sarrerak</h1>
        <label for="pelikula">Pelikula</label>
        <input type="text" id="pelikula">
        <label for = "zinemak">
            <i class="fa-solid fa-film"></i>
            <select id="zinemak">
                <option value="Elorrieta">Elorrieta-errekamari zinema</option>
                <option value="Basauri">Basauri Zinema</option>
                <option value="Bilbao">Ideal Zinema</option>
                <option value="Portugalete">Portugalete Zinema</option>
                <option value="Gazteiz">Gazteiz zinema</option>
            </select>
        </label>
        <label for = "data">
            <i class="fa-solid fa-calendar"></i>
            <input type="date" id="data">
        </label>
        <label for = "saioak">
            <i class="fa-solid fa-clock"></i>
            <select id="saioak">
                <option value="12:20">12:20</option>
                <option value="17:30">17:30</option>
                <option value="20:00">20:00</option>
            </select>
        </label>
        <label for = "kant">
            <i class="fa-solid fa-ticket"></i>
            <input type="number" id="kant" value="1" min="1">
        </label>
        <label for = "prezioa">
            <i class="fa-solid fa-money-bill"></i>
            <input type="number" id="prezioa" value="9.50" readonly>
        </label>

        <button id="sarrerakerosiButton">Sarrerak erosi</button>
    </form>

    <script src="../filmak/js/filmak.js"></script>
</body>
</html>
