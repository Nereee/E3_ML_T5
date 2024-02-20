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
                   
                </td>
            </tr>
            <tr>
                <th><i class="fas fa-film"></i> <u>Zinema</u></th>
                <td>
                <?php
                    echo $_SESSION['zinema_izena'];
                    ?>
                </td>
            </tr>
            <tr>
                <th><i class="fas fa-video"></i> <u>Filma</u></th>
                <td>
                <?php
                    echo $_SESSION['filma_izena'];
                    ?>
                </td>
            </tr>
            <tr>
                <th><i class="far fa-calendar-alt"></i> <u>Eguna</u></th>
                <td>
                <?php
                    echo   $_SESSION ['data'];
                    ?>
                </td>
            </tr>
            <tr>
                <th><i class="far fa-clock"></i> <u>Ordua</u></th>
                <td>
                <?php
                    echo $_SESSION ['ordua']; 
                    ?>
                </td>
            </tr>
            <tr>
                <th><i class="fas fa-sliders-h"></i> <u>Kantitatea</u></th>
                <td>
                <?php
                    echo $_SESSION['id_kant'];
                    ?>
                </td>
            </tr>
            <tr>
                <th><i class="fas fa-money-bill-wave"></i> <u>Prezio totala</u></th>
                <td>
                <?php
                    echo $_SESSION['filma_izena'];
                    ?>
                </td>
            </tr>
        </table><br><br>
        
        <button id="button" onclick = "tiketa()">Baieztatu</button>
    </form>
    
    <script>
    function tiketa() {
        window.location.href = '../index.html'
    };
    </script>
</body>
</html>
