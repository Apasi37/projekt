var headerProfile = document.getElementById("headerProfile");
var notLoggedIn = document.getElementById("notLoggedIn");
function toggleUser(){
    headerProfile.classList.toggle("active");
    notLoggedIn.classList.toggle("active");
}

var overlay = document.getElementById("overlay")
var login = document.getElementById("logIn")
var signup = document.getElementById("signUp")
function openLogIn(){
    login.classList.add('active');
    overlay.classList.add('active');
}

function openSignUp(){
    signup.classList.add('active');
    overlay.classList.add('active');
}

overlay.addEventListener('click', closeLogin);
overlay.addEventListener('click', closeSignup);

function closeLogin(){
    login.classList.remove('active');
    overlay.classList.remove('active');
}

function closeSignup(){
    signup.classList.remove('active');
    overlay.classList.remove('active');
}


function validatePassword(){
    var password = document.forms["signUp"]["password"].value;
    var passwordcheck = document.forms["signUp"]["passwordcheck"].value;
    if( password !== passwordcheck){
        alert("Passwords don't match");
    }
}