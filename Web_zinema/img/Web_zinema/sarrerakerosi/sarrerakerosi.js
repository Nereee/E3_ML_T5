document.getElementById("sarrerakerosiButton").onclick = function (e) {
    e.preventDefault(); 
    
    window.location.href = '../logina/logina.php'
    };
    function datuakegin(){
        var idFilm = window.location.href.split("=")[1];
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
        var url = window.location.href.split("%")[0];
    var data = document.getElementById("data").value;
     window.location.href = (url+ "%data=" + data);
}
window.onload = setMinDate;




