const email = document.getElementById('email');
const pasahitza = document.getElementById('pasahitza');
const button = document.getElementById('button');

button.onclick = function (e) {
    e.preventDefault();

    const data = {
        email: email.value,
        pasahitza: pasahitza.value
    };

    console.log(data);

    window.location.replace('../index/index.html');
};
