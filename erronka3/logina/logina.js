const erabiltzailea = document.getElementById('erabiltzailea');
const pasahitza = document.getElementById('pasahitza');
const button = document.getElementById('button');

button.onclick = function (e) {
    e.preventDefault();

    const data = {
        username: erabiltzailea.value,
        pasahitza: pasahitza.value
    };

    console.log(data);

    window.location.replace('../index/index.html');
};
