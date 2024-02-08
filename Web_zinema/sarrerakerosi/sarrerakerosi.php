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
  // $sql = "Select izena from filma where filma_id = filmid";
  // $mysqli -> query($sql)

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


<script>

const zinema = document.getElementById('zinemak');
const ordua = document.getElementById('saioak');
const data = document.getElementById('data');
const prezioa = document.getElementById('prezioa');
const kant = document.getElementById('kant');
const sarrerakerosiButton = document.getElementById('sarrerakerosiButton');

sarrerakerosiButton.onclick = function (e) {
    e.preventDefault();

    const data = {
        zinema: zinema.value,
        ordua: ordua.value,
        prezioa: prezioa.value,
        kant: kant.value,
    };

    console.log(data);
    window.location.replace('../logina/logina.php');
};


function datuakkargatu() {
    


    let filmid = window.location.href.split("=")[1]
    console.log(filmid)
}
        function ZinemaIzena(){
            <?php
            $mysqli = new mysqli("localhost","root","", "db_Elorrietazinema");
            $sql = "SELECT izena FROM zinema";
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                    var aukera = document.createElement("option");
                    aukera.value = "<?php echo $row['izena']; ?>";
                    aukera.textContent = "<?php echo $row['zinema_izena']; ?>";
                    zinema.appendChild(aukera);
    
                <?php
                }
            ?>
            <?php
                if(isset($_GET['zinema'])){
                ?>
                document.getElementById('zinema').value = "<?php echo $_GET['zinema']?>";
                <?php       
                $zinema = $_GET['zinema'];          
                $sql = "SELECT DISTINCT id_filma,film_izena FROM filma JOIN saioa using (id_filma)  WHERE id_zinema = $zinema ";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    var aukera = document.createElement("option");
                    aukera.value = "<?php echo $row['id_filma']; ?>";
                    aukera.textContent = "<?php echo $row['film_izena']; ?>";
                    document.getElementById('pelikula').appendChild(aukera);
                <?php
                }
            }
            ?>
            <?php 
            if(isset($_GET['zinema']) && isset($_GET['filma'])){ // Agrega isset para verificar si ambos parámetros existen
            ?>
                document.getElementById('pelikula').value = "<?php echo $_GET['filma'] ?>"; // Corrige el nombre de la función getElementById

                document.getElementById('eguna').value = "<?php echo $_GET['zinema'] ?>"; // Corrige el nombre de la función getElementById

            <?php
                $zinema = $_GET['zinema'];
                $filma = $_GET['filma'];
            }
            ?>
            
    }
    
    function Zinema_url(){
            let zinema = document.getElementById("zinema");
            window.location = window.location.pathname + "?zinema="+zinema.value;

        }
    </script>
</body>
</html>
