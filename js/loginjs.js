window.onclick = function (event) {
    if (event.target.matches('.camagrulogo')) {
        window.location.href = "index.php";
    }
    return;
}
function forpass() {
   document.getElementById('fpassdiv').style.display = "block";
   document.getElementById('blurdiv').style.display = "block";
}
function closediv() {
    document.getElementById('fpassdiv').style.display = "none";
    document.getElementById('blurdiv').style.display = "none";
 }
function password() {
    var val = document.getElementById('email').value;
    var url1 = "backend/fchpass.php?email="+val;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url1);
    xhr.responseType = 'text';
    xhr.send();
    xhr.onload = function () {
        var response = xhr.response;
        if (response === "success") {
            alert("Email to change password sent!");
        } else {
            alert("An error occured please try again or contact support");
        }
    };
}