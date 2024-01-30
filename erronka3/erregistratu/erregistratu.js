const izena = document.getElementById('izena');
const abizena = document.getElementById('abizena');
const erabiltzailea = document.getElementById('erabiltzailea');
const posta = document.getElementById('posta');
const pasahitza = document.getElementById('pasahitza');
const pasahitzaerrepikatu = document.getElementById('pasahitzaerrepikatu');
const button = document.getElementById('button');

button.onclick = function (e) {
    e.preventDefault();

    const data = {
        izena: izena.value,
        abizena: abizena.value,
        erabiltzailea: erabiltzailea.value,
        posta: posta.value,
        pasahitza: pasahitza.value,
        pasahitzaerrepikatu: pasahitzaerrepikatu.value
    };


    console.log(data);

     window.location.href = 'C:/Users/in1dm3-d/Desktop/erronka3/logina/logina.html';
};
