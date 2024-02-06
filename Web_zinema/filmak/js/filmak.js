// sarrerakerosiButton.onclick = function (e) {
//     e.preventDefault();

//     window.location.replace('../../sarrerakerosi/sarrerakerosi.php');

    
// };
function lehioa() {
    let filma = document.getElementById("id_film").value

    window.location.replace('../../sarrerakerosi/sarrerakerosi.php?film=' + filma);


}

function datuakkargatu(){
    let filmid = window.location.href.split("=")[1]
    window.alert(filmid)
   
    <?php
    $filmid = $_POST['filmid'];
    echo "La variable filmid es: " . $filmid;
    $sql = "Select izena from filma where id_filma = filmid";
    $mysqli -> query ($sql) 
    ?>
    
}