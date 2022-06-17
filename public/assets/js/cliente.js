//AJAX Para las busquedas, futuramente se implementera mas ampliamente

/*Hacer funciones mas modulares para mejor mantenimiento y facilidad
* Aplicar a la funcion de la tabla en otra ocasion 15/06/22 - 01:09 am
*/

//Evento de busqueda AJAX para la tabla
if (document.querySelector("#search-box") != null) {
    document.querySelector('#search-box').addEventListener('keyup', buscarAjaxTable, true);
}


//Evento de busqueda AJAX para los formularios

if (document.getElementById("autocomplete-input-cliente") != null){
    searchClientForSales()
 }

function searchClientForSales() {
    let inputSearch  = document.querySelector('#autocomplete-input-cliente');
    let resultList = document.querySelector('#autocomplete-results-cliente');
    let idSend = document.querySelector("#id_cliente");
    inputSearch.addEventListener('keyup', buscarAjaxField, true);
    resultList.addEventListener('click',function(event) {
        if (event.target && event.target.nodeName == 'LI') {
            inputSearch.value = event.target.innerHTML;
            idSend.value = event.target.id;
            listarClientes(resultList, []);
        }
    });
}


//Funcion de busqueda de la tabla
function buscarAjaxTable() {
    var xhttp = new XMLHttpRequest();
    let barraBusqueda = document.querySelector('#search-box');
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            let tabla = document.querySelector('#tablaDatos');
            console.log(datos);
            tabla.innerHTML = '';
            let c = 0;
            for (let item of datos) {
                tabla.innerHTML += `
                <tr>
                    <div id='row-content'>
                        <td>${datos[c].id_cliente}</td>
                        <td>${datos[c].ci}</td>
                        <td>${datos[c].cliente}</td>
                        <td>${datos[c].direccion}</td>
                        <td>${datos[c].telefono}</td>
                        <td>${datos[c].ruc}</td>
                        <td>${(datos[c].estado)?'Activo':'Inactivo'}</td>
                    </div>
                    <div id='row-actions'>
                        <td>
                            <form method='POST' id='editForm'>
                                <input type='text' name='id_cliente' value='${datos[c].id_cliente}' hidden>
                                <input type='submit' class='btn-table' value='Editar' id='btn-editar'>
                            </form>
                        </td>
                        <td>
                            <form method='POST' action='clientes_acciones.php' id='deleteForm${datos[c].id_cliente}' >
                                <input type='text' name='id_cliente' value='${datos[c].id_cliente}' hidden>
                                <input type='text' name='estado' value='${datos[c].estado}' hidden>
                            </form>
                            <button id='btn-desactivar' class='btn-table' onclick=\"desactivar(${datos[c].id_cliente},${datos[c].estado});\" >${(datos[c].estado)?'Desactivar':'Reactivar'}</button>
                        </td>
                    </div>
                </tr>
                  `;
                c++;
            }
        }
    }
    xhttp.open('GET', '../api/listar.php?table=clientes&search_key=' + barraBusqueda.value, true);
    xhttp.send();

}


//Funcion de busqueda de clientes para la venta
function buscarAjaxField(event){
    try {
        let resultList = document.querySelector('#autocomplete-results-cliente');
        if (event.target.value.length > 0){
        resultList.style.display = "block";
        var xhttp = new XMLHttpRequest();
        let key = document.querySelector('#autocomplete-input-cliente');
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                //console.log(this.responseText);
                let datos = JSON.parse(this.responseText);
                //console.log(datos);
                listarClientes(resultList, datos);
            }
        }
        xhttp.open('GET', '../api/listar.php?table=clientes&search_key=' + key.value, true);
        xhttp.send();
        } else{
            listarClientes(resultList, []);
        }
    } catch (error) {
        console.log(error);
    }
}

//funcion de crear HTML para listar clientes en ventas
function listarClientes(resultList, datos) {
    resultList.innerHTML = '';
    let c = 0;
    for (let item of datos) {
        resultList.innerHTML += `
            <li id="${datos[c].id_cliente}">${datos[c].cliente}</li>
        `;
        c++;
    }
}


//EXPORTS
//de momento no funciona, pero ver posteriormente si se puede hacer funcionar todo en el main

export function searchClientForSales();