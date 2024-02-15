<?php

if(isset($_GET['email']) && ($_GET['pasahitza'])){
	
	
	
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_erronka3";

// Konexioa sortu
$mysqli = new mysqli($servername, $username, $password, $db);

// Konexioa egiaztatu
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

//Kontsulta


$email = $_GET["email"];
$pwd = $_GET["pasahitza"]; 
$sql = "select id from t_erabiltzaile where izena = '$email' and pasahitza = '$pwd'";
$result = $mysqli->query($sql);

if($result->num_rows > 0){
    header("Location: index.html");
}else{
    echo "Pasahitza edo erabiltzailea ez dira zuzenak";
}



// Konexioa itxi
$mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logina</title>
    <link rel="stylesheet" href="logina.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <form action="logina.php" method="post">
        <h1 class="title">Hasi Saioa</h1>
        <label>
            <i class="fa-solid fa-mail-bulk"></i>
            <input placeholder="Emaila" type="text" id="email">
        </label>
        <label>
            <i class="fa-solid fa-lock"></i>
            <input placeholder="Pasahitza" type="password" id="pasahitza">
        </label>
        
        <button id="button">Sartu</button>
    </form>
    
    <script src="logina.js"></script>
</body>
</html>