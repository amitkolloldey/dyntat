// Get the modal
var modal_login = document.getElementById('login-model');

// Get the button that opens the modal
var btn_login = document.getElementById("login-user-login");
var btn_login2 = document.getElementById("login-user-login2");

// Get the <span> element that closes the modal
var span_login = document.getElementsByClassName("close-login")[0];

// When the user clicks the button, open the modal
btn_login.onclick = function () {
    modal_login.style.display = "block";
}
btn_login2.onclick = function () {
    modal_login.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span_login.onclick = function () {
    modal_login.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal_login) {
        modal_login.style.display = "none";
    }
}