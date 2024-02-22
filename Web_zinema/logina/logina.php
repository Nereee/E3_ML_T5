<?php
session_start();

if(isset($_POST['email']) && isset($_POST['pasahitza'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pasahitza'];

    $mysqli = new mysqli("localhost", "root", "", "db_ElorrietazinemaT5");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
        exit();
    }

    $query = "SELECT Bezero_id FROM bezeroa WHERE email = '$email' AND pasahitza = '$pwd'";
    $result = $mysqli->query($query);
$row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['bezero_id'] =$row['Bezero_id'];
        header("Location: ../tiketa/tiketa.php?" . $_SERVER['QUERY_STRING']);
        exit();
    } else {
        echo '<script>window.alert("Pasahitza edo erabiltzailea ez dira zuzenak");</script>';
    }

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
</head><body>


<form action="" method="post"> 
    <h1 class="title">Hasi Saioa</h1>
    <label>
        <i class="fa-solid fa-mail-bulk"></i>
        <input placeholder="Emaila" type="text" id="email" name="email" required>
    </label>
    <label>
        <i class="fa-solid fa-lock"></i>
        <input placeholder="Pasahitza" type="password" id="pasahitza" name="pasahitza" required>
    </label>
    
    <input type="submit" id="loginbotoia" value="sartu">
</form>
</body>
</html>