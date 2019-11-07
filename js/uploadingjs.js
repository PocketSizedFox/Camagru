var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
  window.onclick = function(event) {
      if (event.target.matches('.camagrulogo')){
          window.location.href = "index.php";
      }
      return;
  }