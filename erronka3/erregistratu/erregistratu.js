const izena = document.getElementById('izena');
const abizena = document.getElementById('abizena');
const posta = document.getElementById('posta');
const pasahitza = document.getElementById('pasahitza');
const pasahitzaerrepikatu = document.getElementById('pasahitzaerrepikatu');
const button = document.getElementById('button');

button.onclick = function (e) {
    e.preventDefault();

    const data = {
        izena: izena.value,
        abizena: abizena.value,
        posta: posta.value,
        pasahitza: pasahitza.value,
        pasahitzaerrepikatu: pasahitzaerrepikatu.value
    };
/*
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

    if (izena.value == '') {
        window.alert('Idatzi zure izena.')
        return;
    }

    if (abizena.value == '') {
        window.alert('Idatzi zure abizena.')
        return;
    }

    if (posta.value == '') {
        window.alert('Idatzi zure maila.')
        return;
    }
*/
    console.log(data);

    window.location.href = '../logina/logina.html';
};
