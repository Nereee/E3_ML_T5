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

     window.location.href = 'C:\\Users\in1dm3-d\Desktop\erronka3\index\index.html';
};
