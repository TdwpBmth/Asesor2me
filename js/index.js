window.onload = inicializar;
function inicializar(){
    iniciarlisteners();

}
function iniciarlisteners(){
    if(document.getElementById('btnIniciarSesion')==null && document.getElementById('btnRegistrarse')==null){
        var cerrarsesion = document.getElementById('btnCerrarSesion');
        cerrarsesion.addEventListener('click', function () {
            window.location = "logout.php";
        });
       
    }else if(document.getElementById('btnRegistrarse')==null){
        var iniciarsesion = document.getElementById('btnIniciarSesion');
        iniciarsesion.addEventListener('click', function () {
            window.location = "login.php";
        });
    }else if(document.getElementById('btnIniciarSesion')!=null && document.getElementById('btnRegistrarse')!=null){
        var iniciarsesion = document.getElementById('btnIniciarSesion');
        var registrarse = document.getElementById('btnRegistrarse');
    
        iniciarsesion.addEventListener('click', function () {
            window.location = "login.php";
        });
    
        registrarse.addEventListener('click', function () {
            window.location = "registro.php";
        });
    }else{
        var registrarse = document.getElementById('btnRegistrarse');
        registrarse.addEventListener('click', function () {
            window.location = "registro.php";
        });
        
    }
}





