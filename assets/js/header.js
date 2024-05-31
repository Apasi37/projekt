
var profileMenu = document.getElementById("profileMenu");
function openProfileMenu(){
    profileMenu.classList.toggle('active');
}

function closeProfileMenu(){
    
}

function validatePassword(){
    var password = document.forms["signUp"]["password"].value;
    var passwordcheck = document.forms["signUp"]["passwordcheck"].value;
    if( password !== passwordcheck){
        alert("Passwords don't match");
    }
}