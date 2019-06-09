function onSignIn(googleUser) {
  if(document.getElementById('cerrar')!==null){
      signOut();
  }else{
      var profile = googleUser.getBasicProfile();
  console.log(profile.getEmail());
  window.location = "logingoogle.php?correo="+profile.getEmail();
  }
  
}

function signOut() {
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function () {
    
  });
}
function sleep(milliseconds) {
var start = new Date().getTime();
for (var i = 0; i < 1e7; i++) {
  if ((new Date().getTime() - start) > milliseconds){
    break;
  }
}
}
