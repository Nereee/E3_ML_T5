const pelikula = document.getElementById('pelikula');
const ordua = document.getElementById('ordua');
const prezioa = document.getElementById('prezioa');
const sarrerak = document.getElementById('sarrerak');
const erabiltzaile = document.getElementById('erabiltzaile');
const sarrerakerosiButton = document.getElementById('sarrerakerosiButton');

sarrerakerosiButton.onclick = function (e) {
    e.preventDefault();

    const data = {
        pelikula: pelikula.value,
        ordua: ordua.value,
        prezioa: prezioa.value,
        sarrerak: sarrerak.value,
        erabiltzaile: erabiltzaile.value
    };

    if (erabiltzaile.value == '') {
        window.alert('Pasahitz bat idatzi.')
        return;
    }

    console.log(data);
    window.location.replace('../logina/logina.html');
};
