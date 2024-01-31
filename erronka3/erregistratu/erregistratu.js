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

    if (pasahitza.value !== pasahitzaerrepikatu.value) {
        window.alert('Pasahitzak ez datoz bat.');
        return;
    }

    if (pasahitza.value == '') {
        window.alert('Pasahitz bat idatzi.')
        return;
    }

    if (!pasahitza.value || pasahitza.value.length < 8) {
        alert('Pasahitzak gutxienez 8 karaktere izan behar ditu.');
        return;
    }

    console.log(data);

    window.location.href = '../logina/logina.html';
};
