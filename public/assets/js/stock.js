//AJAX Para las busquedas, futuramente se implementera mas ampliamente

document.querySelector('#search-box').addEventListener('keyup',buscarAjax, true);


function buscarAjax(){
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