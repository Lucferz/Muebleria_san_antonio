//AJAX Para las busquedas, futuramente se implementera mas ampliamente

document.querySelector('#search-box').addEventListener('keyup',buscarAjaxTable, true);


function buscarAjaxTable(){
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
                    <div id='row-content'>
                        <td>${datos[c].id_categoria}</td>
                        <td>${datos[c].categoria}</td>
                        <td>${(datos[c].estado)?'Activo':'Inactivo' }</td>
                    </div>
                    <div id='row-actions'>
                        <td>
                            <form method='POST' id='editForm'>
                                <input type='text' name='id_categoria' value='${datos[c].id_categoria}' hidden>
                                <input type='submit' class='btn-table' value='Editar' id='btn-editar'>
                            </form>
                        </td>
                        <td>
                            <form method='POST' action='categorias_acciones.php' id='deleteForm${datos[c].id_categoria}' >
                                <input type='text' name='id_categoria' value='${datos[c].id_categoria}' hidden>
                            </form>
                            <button id='btn-desactivar' class='btn-table' onclick=\"desactivar(${datos[c].id_categoria}, ${datos[c].estado});\" >${(datos[c].estado)?'Desactivar':'Reactivar'}</button>
                        </td>
                  </div>
                </tr>
                
                  `;
                c++;
            }
        }
    }
    xhttp.open('GET', '../api/listar.php?table=categorias&search_key='+barraBusqueda.value, true);
    xhttp.send();

}