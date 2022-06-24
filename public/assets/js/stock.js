//AJAX Para las busquedas, futuramente se implementera mas ampliamente


//Evento de busqueda AJAX para la tabla
if (document.getElementById("search-box") != null){
    document.querySelector('#search-box').addEventListener('keyup',buscarAjaxTable, true);
}

//Evento de busqueda AJAX para los formularios
if (document.getElementById("autocomplete-input-articulo") != null){
    let inputSearch  = document.querySelector('#autocomplete-input-articulo');
    let resultList = document.querySelector('#autocomplete-results-articulo');
    let idSend = document.querySelector("#id_articulo");
    inputSearch.addEventListener('keyup', buscarAjaxField, true);
    resultList.addEventListener('click',function(event) {
        if (event.target && event.target.nodeName == 'LI') {
            inputSearch.value = event.target.innerHTML;
            idSend.value = event.target.id;
            listarArticulos(resultList, []);
            hallar_datos(event.target.id);
        }
    });
}


function buscarAjaxTable(){
    var xhttp = new XMLHttpRequest();
    let barraBusqueda = document.querySelector('#search-box');
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
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
                        <td>${datos[c].tipo_iva}</td>
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
                  </div>
                </tr>
                  `;
                c++;
            }
        }
    }
    xhttp.open('GET', '../api/listar.php?table=stock&search_key='+barraBusqueda.value, true);
    xhttp.send();

}



//Funcion de busqueda articulos para la venta
function buscarAjaxField(event){
    try {
        let resultList = document.querySelector('#autocomplete-results-articulo');
        if (event.target.value.length > 0){
        resultList.style.display = "block";
        var xhttp = new XMLHttpRequest();
        let key = document.querySelector('#autocomplete-input-articulo');
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                //console.log(this.responseText);
                let datos = JSON.parse(this.responseText);
                //console.log(datos);
                listarArticulos(resultList, datos);
            }
        }
        xhttp.open('GET', '../api/listar.php?table=stock&search_key=' + key.value, true);
        xhttp.send();
        } else{
            listarArticulos(resultList, []);
        }
    } catch (error) {
        console.log(error);
    }
}

//funcion de crear HTML para listar clientes en ventas
function listarArticulos(resultList, datos) {
    resultList.innerHTML = '';
    let c = 0;
    for (let item of datos) {
        resultList.innerHTML += `
            <li id="${datos[c].id_articulo}">${datos[c].descripcion}</li>
        `;
        c++;
    }
}


function hallar_datos(id) {
    let stock;
    let precio;
    var xhttp = new XMLHttpRequest();
    console.log(id);
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            //console.log(datos);
            stock = datos[0].existencias;
            precio = datos[0].precio_venta;
            console.log(stock);
            console.log(precio);
            document.getElementById("fprecio").value = precio;
            document.getElementById("stock").value = stock;//No esta poniendo nada
        }
    }
    xhttp.open('GET', '../api/listar.php?table=stock&id='+id, true);
    xhttp.send();

    
}