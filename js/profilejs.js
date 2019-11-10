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