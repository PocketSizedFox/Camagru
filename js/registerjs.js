window.onclick = function(event) {
    if (event.target.matches('.camagrulogo')){
        window.location.href = "index.php";
    }
    return;
}
var checkname = function(event) {
    var name = document.getElementById('name');
    if (event.target.value) {
        name.style.border = "2px solid green";
    } else {
        name.style.border = "2px solid red";
    }
};
var checksurname = function(event) {
    var name = document.getElementById('surname');
    if (event.target.value) {
        name.style.border = "2px solid green";
    } else {
        name.style.border = "2px solid red";
    }
};
var checkusername = function(event) {
    var url1 = "backend/verify/checkusername.php?username="+ event.target.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url1);
    xhr.responseType = 'text';
    xhr.send();
    xhr.onload = function () {
        var response = xhr.response;
        var user = document.getElementById('username');
        if (response == 1){
            user.style.border = "2px solid green";
        } else if (response == 0) {
            user.style.border = "2px solid red";
        }
    };
};
var checkphone = function(event) {
  var url1 = "backend/verify/checkphone.php?phone="+ event.target.value;
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url1);
  xhr.responseType = 'text';
  xhr.send();
  xhr.onload = function () {
      var response = xhr.response;
      var user = document.getElementById('phone');
      if (response == 1){
          user.style.border = "2px solid green";
      } else if (response == 0) {
          user.style.border = "2px solid red";
      }
  };
};
var checkemail = function(event) {
    var url1 = "backend/verify/checkemail.php?email="+ event.target.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url1);
    xhr.responseType = 'text';
    xhr.send();
    xhr.onload = function () {
        var response = xhr.response;
        var user = document.getElementById('email');
        if (response == 1){
            user.style.border = "2px solid green";
        } else if (response == 0) {
            user.style.border = "2px solid red";
        }
    };
};
var checkpass = function(event) {
    var pass = document.getElementById('pass').value;
    var url1 = "backend/verify/checkpass.php?pass="+pass+"&reppass="+event.target.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url1);
    xhr.responseType = 'text';
    xhr.send();
    xhr.onload = function () {
        var response = xhr.response;
        var pass = document.getElementById('pass');
        var reppass = document.getElementById('reppass');
        if (response == 1){
            pass.style.border = "2px solid green";
            reppass.style.border = "2px solid green";
        } else if (response == 0) {
            pass.style.border = "2px solid red";
            reppass.style.border = "2px solid red";
        }
    };
};
var checkemail = function(event) {
    
};
