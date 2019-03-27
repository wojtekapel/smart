
function awarie(){
  console.log("error page ready");
  var xml = new XMLHttpRequest();
  xml.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById('awarie').innerHTML = this.responseText;
    }
  }
  xml.open('GET', 'units/awarie.html', true);
  xml.send();
}

function errorFind(){
  var error = document.getElementById('errorValue').value;
  console.log(error);
}
