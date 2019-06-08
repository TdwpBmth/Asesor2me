window.onload = inicializar;
function inicializar(){
    iniciarlisteners();

}
function iniciarlisteners(){
    
        var cerrarsesion = document.getElementById('btnCerrarSesion');
        cerrarsesion.addEventListener('click', function () {
            window.location = "../logout.php";
        });
        var borrar = document.getElementById('btnEliminar');
        borrar.addEventListener('click', function () {
            id=document.getElementsByClassName('collapse usu show');            
            if(id.length!=0){
                elementoid=id[0].firstChild.nextElementSibling.getAttribute('id');  
                opcion = confirm("Realmente desea eliminar el usuario");
                    if (opcion == true) {
                        window.location = "borrar.php?id="+elementoid; 
                    } else {
                        
                    }                
                }
            });

        var editar = document.getElementById('btnEditar');
        editar.addEventListener('click', function () {
            id=document.getElementsByClassName('collapse usu show');            
            if(id.length!=0){
                elementoid=id[0].firstChild.nextElementSibling.getAttribute('id');
                window.location = "editar.php?id="+elementoid;                   
                }
            });
        var registrar = document.getElementById('btnRegistrar');
        registrar.addEventListener('click', function () {
            
                window.location = "registrar.php";                   
                
            });
        
}





