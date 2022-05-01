/*Modal de Insertar*/
document.addEventListener("DOMContentLoaded", function(event) {
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("addNew");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
        }
    }
});

/* Ver si es necesario. Funcion para ir a una pagina dsp de
determinados segundos

function reloadPage(identifier){
    setTimeout(function(){

        window.location.href = "Vistas/"+ +".php"
    }, 2000)
}*/

/*Limpiar campos del formulario*/
document.addEventListener('unload', function(){
    let formulario = document.getElementById('dataform');
    formulario.addEventListener('submit', function() {
      formulario.reset();
    });
  });

/*Preguntar si realmente quiere eliminar el elemento */
document.addEventListener('DOMContentLoaded', function(){
    var btn_del = document.getElementById("btn-desactivar");

    btn_del.onclick = function(event){
        if (window.confirm("¿Esta seguro de querer desactivar el elemento?")) {
            form = document.getElementById('deleteForm');

            formField = document.createElement('input');
            formField.type = 'hidden';
            formField.name = 'del';
            formField.value = 'si';
        
            form.appendChild(formField);
            form.submit();
        }
    }
});
    
