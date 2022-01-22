
var cekall = document.querySelectorAll("input[type = checkbox]");
function checkAll(myCheckBox){
    if (myCheckBox.checked == true){
        cekall.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }else{
        cekall.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
}

function tampil() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck");
    // Get the output text
    var text = document.getElementById("text");
  
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
      text.style.display = "none";
    }
  }