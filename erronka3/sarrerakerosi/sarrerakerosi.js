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
