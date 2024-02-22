<?php
session_start();
?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiketa</title>
    <link rel="stylesheet" href="tiketa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <form action="../index.html" method="post">
        <h1 class="title">Tiketa</h1>

        <table>
            <tr>
                <th><i class="fas fa-user"></i> <u>Bezeroa</u></th>
                <td>
                <?php echo isset($_SESSION['email']) ? explode('@', $_SESSION['email'])[0] : '';  ?>
                </td>
            </tr>
            <tr>
                <th><i class="fas fa-film"></i> <u>Zinema</u></th>
                <td>
                    <?php echo isset($_SESSION['zinema_izena']) ? $_SESSION['zinema_izena'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th><i class="fas fa-video"></i> <u>Filma</u></th>
                <td>
                    <?php echo isset($_SESSION['filma_izena']) ? $_SESSION['filma_izena'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th><i class="far fa-calendar-alt"></i> <u>Eguna</u></th>
                <td>
                    <?php echo isset($_SESSION['data']) ? $_SESSION['data'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th><i class="far fa-clock"></i> <u>Ordua</u></th>
                <td>
                    <?php echo isset($_SESSION['ordua']) ? $_SESSION['ordua'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th><i class="fas fa-sliders-h"></i> <u>Kantitatea</u></th>
                <td>
                <?php echo isset($_GET['kant']) ? $_GET['kant'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th><i class="fas fa-money-bill-wave"></i> <u>Prezio totala</u></th>
                <td>
                <?php echo isset($_GET['prezioa']) ? $_GET['prezioa'] : ''; ?>

                </td>
            </tr>
        </table><br><br>
        
        <button id="button" onclick="tiketa()">Baieztatu</button>
    </form>
    
    <script>
    function tiketa() {
        <?php
        $mysqli = new mysqli("localhost", "root", "", "db_ElorrietazinemaT5");
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
            exit();
        }
        $prezioa = $_GET['prezioa'];
        $bezero_id = $_SESSION['bezero_id'];
        $saioa_id = $_SESSION['id_saioa'];
        $kant = $_GET['kant'];

        
        $sqlerosketa = "INSERT INTO erosketak (dirutotala, jatorria, Bezero_id, Deskontua) VALUES ($prezioa, 'online', $bezero_id, 0)";
      
            if ($mysqli->query($sqlerosketa)) {
             echo "Erosketa ondo gehitu da.";
         } else {
            echo "Errorea erosketa gehitzean: " . $mysqli->error;
        }

        ?>
        window.location.href = '../index.html'
    };
    </script>
</body>
</html>
