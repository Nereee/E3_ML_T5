<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarrerak</title>
    <link rel="stylesheet" href="sarrerakerosi.css">
</head>
<body onload="datuakegin()">
    <a href="../index.html" id="atzera"><img src="../img/fletxa.png" alt="fletxa"></a>
    <form action="sarrerakerosi.php" method="get" id="sarrerakerosi" name="sarrerakerosi">
        <h1 class="title">Sarrerak</h1>
        <label for="pelikula">
    Pelikula: 
    
    <?php
    $mysqli = new mysqli("localhost", "root", "", "db_Elorrietazinema");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
        exit();
    }
   
    $sql = "SELECT izena FROM FILMA WHERE filma_id = ?";
    $stmt = $mysqli->prepare($sql);
    
    if (!$stmt) {
        echo "Error al preparar la consulta: (" . $mysqli->errno . ") " . $mysqli->error;
        exit();
    }
    
    $stmt->bind_param("i", $pelikula_id);
    
    if (!$stmt->execute()) {
        echo "Error al ejecutar la consulta: (" . $stmt->errno . ") " . $stmt->error;
        exit();
    }
    
    $stmt->bind_result($pelikula_izena);
    $stmt->fetch();

    echo "<input readonly type='text' value='" . $pelikula_izena . "' >";

    $stmt->close();
    $mysqli->close();
    ?>
</label>
        <label for="zinemak">
            <i class="fa-solid fa-film"></i>
            <select id="zinemak">
                <?php
                $mysqli = new mysqli("localhost", "root", "", "db_Elorrietazinema");
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
                    exit();
                }
                
                $sql = "SELECT zinema_id, izena FROM ZINEMA";
                $result = $mysqli->query($sql);
                
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['zinema_id'] . "'>" . $row['izena'] . "</option>";
                }
                
                $result->free();
                $mysqli->close();
                ?>
            </select>
        </label>
        <label for="data">
            <i class="fa-solid fa-calendar"></i>
            <input type="date" id="data">
        </label>
        <label for="saioak">
            <i class="fa-solid fa-clock"></i>
            <select id="saioak">
                <option value="12:20">12:20</option>
                <option value="17:30">17:30</option>
                <option value="20:00">20:00</option>
            </select>
        </label>
        <label for="kant">
            <i class="fa-solid fa-ticket"></i>
            <input type="number" id="kant" value="1" min="1">
        </label>
        <label for="prezioa">
            <i class="fa-solid fa-money-bill"></i>
            <input type="number" id="prezioa" value="9.50" readonly>
        </label>

        <button id="sarrerakerosiButton">Sarrerak erosi</button>
    </form>

    <script >
function datuakegin(){
    var idFilm = window.location.href.split("=")[1];
    window.alert(idFilm);
}
    </script>
</body>
</html>
