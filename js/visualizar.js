var httpRequest;
function iniciarlisteners(){
    var btnComentar = document.getElementById('btnComentar');
   
        var cerrarsesion = document.getElementById('btnCerrarSesion');
        
        cerrarsesion.addEventListener('click', function () {
            window.location = "logout.php";
        });
        
        if(document.getElementById('btnIniciarSesion')!=null) {
            var iniciarSesion = document.getElementById('btnIniciarSesion');
            iniciarSesion.addEventListener('click', function () {
                window.location = "login.php";
            });
                var registrarse = document.getElementById('btnRegistrarse');
            registrarse.addEventListener('click', function () {
                window.location = "registro.php";
            });
        }
        
       
}


function solicitarComentarios() {
    var preguntaid = document.querySelector("#idPreguntaActual").value;
    httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = cargarPreguntas;
    httpRequest.open("POST", 'obtenercomentarios.php');
    httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpRequest.send('pregunta=' + preguntaid);
    httpRequest.timeout = 2000;
    
}
function eliminar($id){
   // window.location = "eliminarcomentario.php?id=";
    httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = cargarPreguntas;
    httpRequest.open("POST", 'eliminarcomentario.php');
    httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpRequest.send('id=' + $id);
    
}
function reportar(){
    
}
function cargarPreguntas() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
            if(httpRequest.responseText!="exito"){
                document.getElementById("listaComentarios").innerHTML=httpRequest.responseText;
                
                inciarListener();
            }else{
                document.getElementById('txtBoxComentario').value="";
                solicitarComentarios();
            }
            
        } else {                 
       
            document.querySelector(".contenedor").innerHTML = "<div class='alert alert-danger' role='alert'>Ocurrio un error al obtener los comentarios</div>";
        }
        
    }
}

function inciarListener(){
    var imgUsuario = document.getElementsByClassName('imgUsuario'); 
    var idUsuarioComentario = document.getElementsByClassName("idUsuarioComentario");
    for (let i = 0; i < imgUsuario.length; i++) {
        imgUsuario[i].addEventListener('click', function(){
        window.location = "visualizarPerfil.php?usuario="+idUsuarioComentario[i].value;
    })
        
    }
    
}

function irUsuario(){
    
}

function inicializar(){
    iniciarlisteners();
    setInterval('solicitarComentarios()',1000);
    solicitarComentarios();
    if(document.getElementById("btnComentar")!=null){
    var btnComentar = document.getElementById('btnComentar');
    btnComentar.addEventListener('click', function(){
    var contenido=document.getElementById('txtBoxComentario').value;
    var preguntaid = document.querySelector("#idPreguntaActual").value;
    if(contenido!=""){
    httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = cargarPreguntas;
    httpRequest.open("POST", 'procesarcomentario.php?id_pregunta='+preguntaid);
    httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpRequest.send('comentario=' + contenido);
    httpRequest.timeout = 2000;
    httpRequest.ontimeout = function (e) {
        //document.querySelector("#horoscopo").innerHTML = "El servidor está ocupado, inténtalo más tarde.";
        }
    }
    });    
}    
}
window.onload = inicializar;