console.log('master.js is ready.');


var xml = new XMLHttpRequest();
xml.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200){
     console.log(this.responseText);
     if(this.responseText == 'out'){
       var xml = new XMLHttpRequest();
       xml.onreadystatechange = function(){
         if(this.readyState == 4 && this.status == 200){
           document.getElementById('container').innerHTML = this.responseText;

         }
       }
       xml.open('GET', 'units/login.html', true);
       xml.send();

     }
     else{
       var xml = new XMLHttpRequest();
       xml.onreadystatechange = function(){
         if(this.readyState == 4 && this.status == 200){
            document.getElementById('container').innerHTML = this.responseText;
            posts();
            awarie();
         }
       }
       xml.open('GET', 'units/main.html', true);
       xml.send();

}
}
}
xml.open('GET', 'auth/auth.php', true);
xml.send();





function functionLogin(){
  var login = document.getElementById('loginValue').value;
  var pass = document.getElementById('passValue').value;

  enter(login, pass);
  // console.log(login+" "+pass);

}

function enter(login, pass){
  var xml = new XMLHttpRequest();
  xml.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        console.log(this.responseText);
        window.location.assign('/forum');
    }
    else console.log("loading");
  }
  xml.open('GET', 'units/auth.php?login='+login+'&password='+pass, true);
  xml.send();
}

function functionRegister(){
  var xml = new XMLHttpRequest();
  xml.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      document.getElementById('container').innerHTML = this.responseText;

    }
  }
  xml.open('GET', 'units/register.html', true);
  xml.send();
}

function posts(){


  var xml = new XMLHttpRequest();
  xml.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById("tablica").innerHTML += this.responseText;
    }
  }
  xml.open('GET', 'units/getPosts.php', true);
  xml.send();
}


function newForum(){
  console.log('dodaj');
  var xml = new XMLHttpRequest();
  xml.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById("tablica").innerHTML = this.responseText;
    }
  }
  xml.open('GET', 'units/addPost.html', true);
  xml.send();
}

function savePost(){

  var forumT = document.getElementById('newForumTheme').value;
  var forumC = document.getElementById('newForumText').value;

  var xml = new XMLHttpRequest();
  xml.onreadystatechange = function(){
    if(this.readyState = 4 && this.status == 200){
      document.getElementById("tablica").innerHTML = this.responseText;
    }
  }
  xml.open("POST", "units/savePost.php", true);
  xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xml.send('theme='+forumT+'&content='+forumC);
}

function linkClick(Lid){
  const id = Lid.replace("link", "");

  var xml = new XMLHttpRequest();
  xml.onreadystatechange = function(){
    if (this.readyState = 4 && this.status == 200){
      document.getElementById("tablica").innerHTML = this.responseText;
    }
  }
  xml.open('GET', 'units/showPost.php?number='+id, true);
  xml.send();
}
