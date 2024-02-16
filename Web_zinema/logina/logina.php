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
        
        <button id="button" onclick = "logina()">Sartu</button>
    </form>
    
    <script>
    function logina() {
    window.location(index.html)
    };


                <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $db = "db_elorrietazinemaT5";

                // Crear conexión
                $conn = new mysqli($servername, $username, $password, $db);

                // Verificar conexión
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $email = $_POST['email'];
                $pwd = $_POST['pasahitza'];

                // Consulta preparada para evitar SQL injection
                $stmt = $conn->prepare("SELECT email FROM bezeroa WHERE email = ? AND pasahitza = ?");
                $stmt->bind_param("ss", $email, $pwd);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    header("Location: ../index.html");
                    exit(); 
                } else {
                    echo "<script>alert('Pasahitza edo erabiltzailea ez dira zuzenak');</script>";
                }

                $stmt->close();
                $conn->close();
            }
            ?>
    </script>
</body>
</html>