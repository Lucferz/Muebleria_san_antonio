/*Modal*/
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
    location.replace(window.location.href);
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
    
//AJAX Para las busquedas, futuramente se implementera mas ampliamente

document.querySelector('#search-box').addEventListener('keyup',buscarAjax, true);


function buscarAjax(){
    var xhttp = new XMLHttpRequest();
    let barraBusqueda = document.querySelector('#search-box');
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let datos = JSON.parse(this.responseText);
            let tabla = document.querySelector('#tablaDatos');
            console.log(datos);
            tabla.innerHTML = '';
            let c = 0;
            for(let item of datos){
                tabla.innerHTML += `
                <tr>
                    <div>
                        <td>${datos[c].id_articulo}</td>
                        <td>${datos[c].descripcion}</td>
                        <td>${datos[c].precio_compra}</td>
                        <td>${datos[c].precio_venta}</td>
                        <td>${datos[c].existencias}</td>
                        <td>${datos[c].categoria}</td>
                        <td>${(datos[c].estado)?'Activo':'Inactivo'}</td>
                    </div>
                    <div id='row-actions'>
                        <td>
                            <form method='POST' id='editForm'>
                            <input type='text' name='id_articulo' value='${datos[c].id_articulo}' hidden>
                            <input type='submit' class='btn-table' value='Editar' id='btn-editar'>
                            </form>
                        </td>
                        <td>
                            <form method='POST' action='stock_acciones.php' id='deleteForm${datos[c].id_articulo}' >
                            <input type='text' name='id_articulo' value='${datos[c].id_articulo}' hidden>
                            <input type='text' name='estado' value='${datos[c].estado}' hidden>
                            </form>
                            <button id='btn-desactivar' class='btn-table' onclick=\"desactivar(${datos[c].id_articulo}, ${datos[c].estado});\" >${(datos[c].estado)?'Desactivar':'Reactivar'}</button>
                        </td>
                    </td>
                  </div>
                </tr>
                  `;
                c++;
            }
        }
    }
    xhttp.open('GET', 'stock_acciones.php?action=search&search_key='+barraBusqueda.value, true);
    xhttp.send();

}