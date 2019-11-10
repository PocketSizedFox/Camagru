window.onclick = function (event) {
    if (event.target.matches('.camagrulogo')) {
        window.location.href = "index.php";
    }
    return;
}
function password() {
    var url1 = "backend/chpass.php";
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
var url1 = "backend/checkuser.php";
var xhr = new XMLHttpRequest();
xhr.open('GET', url1);
xhr.responseType = 'text';
xhr.send();
xhr.onload = function () {
    var response = xhr.response;
    document.getElementById("avatar").src = "database/avatars/" + response + ".jpg";
};
function getnotify() {
    var url1 = "backend/checknotify.php";
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url1);
    xhr.responseType = 'text';
    xhr.send();
    xhr.onload = function () {
        var response = xhr.response;
        if (response === "Yes") {
            setnotify("No");
            document.getElementById("Yes").innerHTML = "No";
            document.getElementById("Yes").id = "No";
        } else if (response === "No") {
            setnotify("Yes");
            document.getElementById("No").innerHTML = "Yes";
            document.getElementById("No").id = "Yes";
        }
    };
}
function checknotify() {
    var url1 = "backend/checknotify.php";
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url1);
    xhr.responseType = 'text';
    xhr.send();
    xhr.onload = function () {
        var response = xhr.response;
        document.getElementById("Yes").innerHTML = response;
        document.getElementById("Yes").id = response;
    };
}

function setnotify(val) {
    var url1 = "backend/setnotify.php?value=" + val;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url1);
    xhr.responseType = 'text';
    xhr.send();
    xhr.onload = function () {
        var response = xhr.response;
    };
    return;
}