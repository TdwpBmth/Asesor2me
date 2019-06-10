function onSignIn(googleUser) {
  if(document.getElementById('cerrar')!==null){
      signOut();
  }else{
  var profile = googleUser.getBasicProfile();
  var email =profile.getEmail()
  signOut();
  window.location = "logingoogle.php?correo="+email;
  }
  
}

function signOut() {
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function () {
    
  });
}


