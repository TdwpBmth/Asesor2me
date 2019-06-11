function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var email =profile.getEmail();
    var nombre = profile.getName();
    signOut();
    window.location = "procesarregistrosocial.php?correo="+email+"&&nombre="+nombre;
}    

function signOut() {
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function () {
    
  });
}
