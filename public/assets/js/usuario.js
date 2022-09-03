//AJAX Para las busquedas, futuramente se implementera mas ampliamente

document.querySelector('#search-box').addEventListener('keyup', buscarAjaxTable, true);


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
                        <td>${datos[c].id_usuario}</td>
                        <td>${datos[c].Nombre}</td>
                        <td>${datos[c].ci}</td>
                        <td>${datos[c].usuario}</td>
                        <td>${datos[c].tipo}</td>
                        <td>${Number(datos[c].estado)?'Activo':'Inactivo'}</td>
                    </div>
                    <div id='row-actions'>
                        <td>
                            <form method='POST' id='editForm'>
                                <input type='text' name='id_usuario' value='${datos[c].id_usuario}' hidden>
                                <input type='submit' class='btn-table' value='Editar' id='btn-editar'>
                            </form>
                        </td>
                        <td>
                            <form method='POST' action='../acciones/usuario_acciones.php' id='deleteForm${datos[c].id_usuario}' >
                                <input type='text' name='id_usuario' value='${datos[c].id_usuario}' hidden>
                                <input type='text' name='estado' value='${datos[c].estado}' hidden>
                            </form>
                            <button id='btn-desactivar' class='btn-table' onclick=\"desactivar(${datos[c].id_usuario}, ${datos[c].estado});\" >${Number(datos[c].estado)?'Desactivar':'Reactivar'}</button>
                        </td>
                    </div
                </tr>
                  `;
                c++;
            }
        }
    }
    xhttp.open('GET', '../api/listar.php?table=usuarios&search_key='+barraBusqueda.value, true);
    xhttp.send();

}