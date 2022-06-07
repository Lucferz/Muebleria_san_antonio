//AJAX Para las busquedas, futuramente se implementera mas ampliamente

document.querySelector('#search-box').addEventListener('keyup', buscarAjax, true);


function buscarAjax() {
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