//importaciones
// import * as stock from "stock.js";
// import * as cliente from "cliente.js";
//De momento no sirven como lo esperado, asi que dejar asi por ahora


/*Modal*/
document.addEventListener("DOMContentLoaded", function(event) {
    // Get the modal
    var modal = document.getElementById("myModal");

    if (modal){

        // Get the button that opens the modal
        var btn = document.getElementById("addNew");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        if (btn != null) {
            btn.onclick = function() {
                modal.style.display = "block";
            }
        }
        

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        location.replace(window.location.href);
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
            modal.style.display = "none";
            }
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

/*Preguntar si realmente quiere desactivar/reactivar el elemento */
function desactivar(numero, estado){
    let pregunta = estado? "¿Esta seguro de querer desactivar el elemento?":"¿Esta seguro de querer reactivar el elemento?";
    if (window.confirm(pregunta)) {
        var idForm = 'deleteForm' + numero.toString(); 
        form = document.getElementById(idForm);

        formField = document.createElement('input');
        formField.type = 'hidden';
        formField.name = 'del';
        formField.value = 'si';
    
        form.appendChild(formField);
        form.submit();
    }
}

//Pregunta si realmente se quiere eliminar definitivamente un elemento
function eliminar(numero){
    if (window.confirm("¿Esta seguro de querer eliminar definitivamente el elemento?")) {
        var idForm = 'deleteForm' + numero.toString(); 
        form = document.getElementById(idForm);

        formField = document.createElement('input');
        formField.type = 'hidden';
        formField.name = 'del';
        formField.value = 'si';
    
        form.appendChild(formField);
        form.submit();
    }
}
   
function anular(numero){
    if (window.confirm("¿Esta seguro de querer anular la venta?")) {
        var idForm = 'deleteForm' + numero.toString(); 
        form = document.getElementById(idForm);

        formField = document.createElement('input');
        formField.type = 'hidden';
        formField.name = 'del';
        formField.value = 'si';
    
        form.appendChild(formField);
        form.submit();
    }
}
