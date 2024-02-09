document.getElementById("sarrerakerosiButton").onclick = function (e) {
    e.preventDefault(); 

    var idFilm = document.getElementById("id_film").value;
    window.location.href = '../../sarrerakerosi/sarrerakerosi.php?id_film=' + idFilm;
};






    