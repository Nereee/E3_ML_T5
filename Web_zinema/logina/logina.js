const email = document.getElementById('email');
const pasahitza = document.getElementById('pasahitza');
const button = document.getElementById('button');

button.onclick = function (e) {
    e.preventDefault();

    const data = {
        email: email.value,
        pasahitza: pasahitza.value
    };
/*
    if (email.value == '') {
        window.alert('Email bat idatzi.')
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
*/
    console.log(data);

    window.location.replace('../index/index.html');
};
