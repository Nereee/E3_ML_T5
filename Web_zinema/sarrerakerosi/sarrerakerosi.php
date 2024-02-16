<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarrerak</title>
    <link rel="stylesheet" href="sarrerakerosi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
         function datuakegin(){
        var idFilm = window.location.href.split("=")[1];
        <?php
        if(isset($_GET["zinema_id"])){
            ?>
           
            document.getElementById("zinema").value = <?php echo $_GET["zinema_id"] ?>;
        <?php    
        }
        ?>
    }
        function erosi() {
        
        
        window.location.href = '../logina/logina.php'
        };
    

        function Prezioakalkulatu() {
            var kant = document.getElementById("kant").value;
            var prezioa = parseFloat(kant) * 9.50; 
            document.getElementById("prezioa").value = prezioa.toFixed(2); 
        }

        function setMinDate() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("data").min = today;
    }
        function zineAukeratu(){
        var url = window.location.href.split("&")[0];
        var zine = document.getElementById("zinema").value;
        window.location.href = (url+ "&zinema=" + zine);

    }
        function dataAukeratu(){
            var url = window.location.href.split("&")[0];
        var data = document.getElementById("data").value;
        window.location.href = (url+ "&data=" + data);
    }
        window.onload = setMinDate;

    </script>

</head>
<body onload="datuakegin()">
    <a href="../index.html" id="atzera"><img src="../img/fletxa.png" alt="fletxa"></a>
    <form method="get" id="sarrerakerosi" name="sarrerakerosi">
        <h1 class="title">Sarrerak</h1>
        <label for="pelikula">            Pelikula:         </label>
    <select id= "id_film">

            <?php
            $mysqli = new mysqli("localhost", "root", "", "db_ElorrietazinemaT5");
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
                exit();
            }

            $idfilm = $_GET['id_film'];

            $sql = "SELECT izena, filma_id FROM FILMA WHERE filma_id = $idfilm ";
            $emaitza = $mysqli->query($sql);

            while ($row = $emaitza->fetch_assoc()) {
                echo "<option value='" . $row['filma_id'] . "'>" . $row['izena'] ."</option>";
            }  
            
            ?>
            </select>
        <label for="zinema">
        <i class="fa-solid fa-film"></i>
        <select id="zinema" name="zinema_id" onchange="zineAukeratu()">
            <?php
            $filma = $_GET["id_film"];
            $selectedZinema = isset($_GET["zinema_id"]) ? $_GET["zinema_id"] : ''; 
            $sql = "SELECT DISTINCT zinema_id, izena FROM ZINEMA INNER JOIN SAIOA USING (zinema_id) WHERE filma_id = $filma";

            $result = $mysqli->query($sql);

            while ($row = $result->fetch_assoc()) {

                echo "<option value='" . $row['zinema_id'] . "'>" . $row['izena'] . "</option>";

                }

            $result->free();
            ?>
        </select>
    </label>
        <label for="data">
            <i class="fa-solid fa-calendar"></i>
            <input type="date" id="data" onchange = "dataAukeratu()">
        </label>
        <label for="saioak">
            <i class="fa-solid fa-clock"></i>
            <select id="saioak">
            <?php
                $data = $_GET["data"];

                $sql = "SELECT ordutegia, f.izena, eguna FROM saioa s INNER JOIN filma f USING(filma_id) WHERE s.filma_id = $filma AND eguna = '$data'";

                $result = $mysqli->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['eguna'] . "'>" . $row['ordutegia'] . "</option>";
                }

                $result->free();
                ?>

                <option></option>

            </select>
        </label>
        <label for="kant">
    <i class="fa-solid fa-ticket"></i>
    <input type="number" id="kant" value="1" min="1" onchange="Prezioakalkulatu()">
        </label>

        <label for="prezioa">
            <i class="fa-solid fa-money-bill"></i>
            <?php
            $sql = "SELECT prezioa FROM FILMA WHERE filma_id = $filma";
            $result = $mysqli->query($sql);
            
            while ($row = $result->fetch_assoc()) {
                echo "<input id='prezioa' onchange='Prezioakalkulatu()' readonly type='text' value=" . $row['prezioa'] . "> ";
            }  

            $mysqli->close();
            ?>
        </label>

        </label>
        <input type="button" id="sarrerakerosiButton" value ="Sarrerak erosi" onclick ="erosi()">
    </form>
    
</body>
</html>
