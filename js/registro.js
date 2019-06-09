function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    window.location = "registrogoogle.php?nombre="+profile.getName()+"&&correo="+profile.getEmail();
}    
