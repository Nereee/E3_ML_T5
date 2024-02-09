document.getElementById("sarrerakerosiButton").onclick = function (e) {
    e.preventDefault(); 
    window.location.href = '../../sarrerakerosi/sarrerakerosi.php'; 

    function lehioa(){
        let filma_id = document.getElementById('filma_id').value;
        let zatiak = filma_id.split('=');

        filma_id = zatiak[1];
        window.alert(filma_id);
        window.location.href = "http://localhost/web_zinema/sarrerakerosi/sarrerakerosi.php?filma_id=" + filma_id;;
        
        }
};



    