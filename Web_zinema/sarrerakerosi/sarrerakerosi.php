<?php
session_start();
?>
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
        function datuakegin() {
            var idFilm = (new URLSearchParams(window.location.search)).get('id_film');

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
                $_SESSION ['filma_izena'] = $row['izena'] ;
            ?>

            var option = document.createElement("option");
            option.text = '<?php echo $row['izena'] ?>';
            option.value = '<?php echo $row['filma_id'] ?>';
            document.getElementById("id_film").appendChild(option);
            <?php
            }  

            $filma = $_GET["id_film"];
            $selectedZinema = isset($_GET["zinema_id"]) ? $_GET["zinema_id"] : ''; 
           
            $sql = "SELECT DISTINCT zinema_id, izena FROM ZINEMA INNER JOIN SAIOA USING (zinema_id) WHERE filma_id = $filma";

            $result = $mysqli->query($sql);

            while ($row = $result->fetch_assoc()) {
                $_SESSION ['zinema_izena'] = $row['izena'] ;
            ?>

            var option = document.createElement("option");
            option.text = '<?php echo $row['izena'] ?>';
            option.value = '<?php echo $row['zinema_id'] ?>';
            document.getElementById("zinema").appendChild(option);
            <?php
            }

            $result->free();

            if(isset($_GET["zinema"])){
            ?>
            document.getElementById("zinema").value = '<?php echo $_GET["zinema"] ?>';
            <?php    
            }
            ?>

            var urlParams = new URLSearchParams(window.location.search);
            var fechaParam = urlParams.get('data');
            if (fechaParam) {
                document.getElementById("data").value = fechaParam;
            }
        }

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
            var url = window.location.href.split("?")[0];
            var data = document.getElementById("data").value;
            var zinema = document.getElementById("zinema").value;
            var filma = document.getElementById("id_film").value;
            var kant = document.getElementById("kant").value; 
            
            window.location.href = (url + "?id_film=" + filma + "&zinema=" + zinema + "&data=" + data + "&kant=" + kant);

            <?php
            $_SESSION['id_film'] = $_GET['id_film']; 

            if(isset($_GET["zinema"])&& isset($_GET['data'])&& isset($_GET['saioak'])&& isset($_GET['kant'])&& isset($_GET['prezioa']) ) {
            $_SESSION['id_zinema'] = $_GET["zinema"];  
            $_SESSION['id_data'] = $_GET['data'];   
            $_SESSION['id_saioa'] = $_GET['saioak'];  
            $_SESSION['id_kant'] = $_GET['kant'];  
            $_SESSION['id_prezioa'] = $_GET['prezioa'];   
            }
           
            ?>
        }

        function Prezioakalkulatu() {
            var url = window.location.href;
            

            var kant = document.getElementById("kant").value;
            var prezioa = parseFloat(kant) * 9.50; 
            document.getElementById("prezioa").value = prezioa.toFixed(2); 
        }
      
        function erosi() {
    var idFilm = document.getElementById("id_film").value;
    var idZinema = document.getElementById("zinema").value;
    var data = document.getElementById("data").value;
    var kant = document.getElementById("kant").value; 
    var prezioa = document.getElementById("prezioa").value; 
    
    
    var url = '../logina/logina.php?' + 'id_film=' + idFilm + '&zinema=' + idZinema + '&data=' + data + '&kant=' + kant + '&prezioa=' + prezioa; 
    
    window.location.href = url;
}


        window.onload = function() {
            setMinDate();
            datuakegin();
        };
    </script>

</head>
<body>
    <a href="../index.html" id="atzera"><img src="../img/fletxa.png" alt="fletxa"></a>
    <form method="get" id="sarrerakerosi" name="sarrerakerosi">
        <h1 class="title">Sarrerak</h1>
        <label for="pelikula">Pelikula:</label>
        <select id="id_film"></select>
        <label for="zinema">
            <i class="fa-solid fa-film"></i>
            <select id="zinema" name="zinema_id" onchange="zineAukeratu()"></select>
        </label>
        <label for="data">
            <i class="fa-solid fa-calendar"></i>
            <input type="date" id="data" onchange="dataAukeratu()">
        </label>
        <label for="saioak">
            <i class="fa-solid fa-clock"></i>
            <select name = "saioak" id="saioak">
            <?php
                $data = $_GET["data"];
                $zinema = $_GET["zinema"];

                $sql = "SELECT saioa_id, ordutegia, f.izena, eguna FROM saioa s INNER JOIN filma f USING(filma_id) WHERE s.filma_id = $filma AND eguna = '$data' AND s.zinema_id = '$zinema'";

                $result = $mysqli->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['eguna'] . "'>" . $row['ordutegia'] . "</option>";
                    $_SESSION ['data'] = $row['eguna'] ;
                    $_SESSION ['ordua'] = $row['ordutegia'] ;
                    $_SESSION ['id_saioa'] = $row['saioa_id'] ;
                }

                $result->free();
                ?>

                <option></option>

            </select>
            
        <label for="kant">
            <i class="fa-solid fa-ticket"></i>
            <input type="number" id="kant" name = "kant" min="1" onchange="Prezioakalkulatu()">
        </label> 
        <label for="prezioa">
            <i class="fa-solid fa-money-bill"></i>
            <input id='prezioa' name = "prezioa" onchange='Prezioakalkulatu()' readonly type='text'>
        </label>
        <input type="button" id="sarrerakerosiButton" value="Sarrerak erosi" onclick="erosi()">
    </form>
</body>
</html>
