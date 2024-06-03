var admin_edit = document.getElementById("admin_edit");
var overlay = document.getElementById("overlay");
function toggleEdit(id){
    admin_edit.classList.toggle('active');
    document.getElementById('editid').value = id;
    document.getElementById('editInfo').innerHTML = id;
    overlay.classList.add("active");
}

var admin_add = document.getElementById("admin_add");
function toggleAdd(){
    admin_add.classList.toggle('active');
    overlay.classList.add("active");
}

function overlayOff(){
    overlay.classList.remove("active");
    admin_add.classList.remove('active');
    admin_edit.classList.remove('active');
}

