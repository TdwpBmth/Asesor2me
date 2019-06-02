
window.onload = inicializar;
function inicializar(){
    iniciarlisteners();

}
function iniciarlisteners(){
    var editarFoto = document.getElementById('edit-icon-foto');
    var guardar = document.getElementById('btnGuardar');
    var cancelar = document.getElementById('btnCancelar');
    var editarNombre = document.getElementById('edit-icon-nombre');
    var editarEdad = document.getElementById('edit-icon-edad');
    var inputEdad=document.getElementById('frmEdad');
    var inputNombre=document.getElementById('frmNombre');
    var inputFoto=document.getElementById('frmFoto');
    var txtNombre= document.getElementById('txtNombre');
    var valorInputNombre=document.getElementById('inputNombre')
    
    editarFoto.addEventListener('click', function () {
        inputFoto.classList.remove('ocultar');
        guardar.removeAttribute('disabled');
        cancelar.removeAttribute('disabled');
        editarFoto.classList.add('ocultar');
        editarNombre.classList.add('ocultar');
        editarEdad.classList.add('ocultar');
    });
        editarNombre.addEventListener('click', function () {
        inputNombre.classList.remove('ocultar');
        valorInputNombre.setAttribute('placeholder',document.getElementById('valorNombre').textContent);
        txtNombre.classList.add('ocultar');
        guardar.removeAttribute('disabled');
        cancelar.removeAttribute('disabled');
        editarNombre.classList.add('ocultar');
        editarFoto.classList.add('ocultar');
        editarEdad.classList.add('ocultar');
    });
    editarEdad.addEventListener('click', function () {
        valorInputEdad=document.getElementById('inputEdad')
        inputEdad.classList.remove('ocultar');
        valorInputEdad.setAttribute('placeholder',document.getElementById('valorEdad').textContent);
        txtEdad.classList.add('ocultar');
        guardar.removeAttribute('disabled');
        cancelar.removeAttribute('disabled');
        editarNombre.classList.add('ocultar');
        editarFoto.classList.add('ocultar');
        editarEdad.classList.add('ocultar');
    });

    cancelar.addEventListener('click', function () {
        if(editarFoto.className='ocultar'){
            inputFoto.classList.add('ocultar');
            guardar.setAttribute('disabled','disabled');
            cancelar.setAttribute('disabled','disabled');
            editarNombre.classList.remove('ocultar');
            editarEdad.classList.remove('ocultar');
            editarEdad.classList.add('edit-icon');
            editarFoto.classList.add('edit-icon');
            editarNombre.classList.add('edit-icon');
            editarFoto.classList.remove('ocultar');
            inputEdad.classList.add('ocultar');
            inputNombre.classList.add('ocultar');
            txtNombre.classList.remove('ocultar');
            txtEdad.classList.remove('ocultar');
        }
       
    });

    guardar.addEventListener('click', function () {
        
        if(inputFoto.className!='ocultar'){
            document.getElementById('frmFoto').submit();
        }else if(inputEdad.className=='ocultar'){
            if(valorInputNombre!=null){
            
            inputNombre.submit();
            }
        }else{
            if(document.getElementById('inputEdad')){
                inputEdad.submit();
                }
        }

    });
}
