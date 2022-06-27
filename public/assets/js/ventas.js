//AJAX Para las busquedas, futuramente se implementera mas ampliamente
if (document.getElementById("search-box") != null){
    document.querySelector('#search-box').addEventListener('keyup', buscarAjaxTable, true);
}

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
                        <td>${datos[c].id_venta}</td>
                        <td>${datos[c].cliente}</td>
                        <td>${datos[c].vendedor}</td>
                        <td>${datos[c].tipo_venta}</td>
                        <td>${datos[c].comprobante}</td>
                        <td>${(datos[c].num_factura != "")?datos[c].num_factura:"-"}</td>
                        <td>${(datos[c].num_ticket != "")?datos[c].num_ticket:"-"}</td>
                        <td>${datos[c].articulo}</td>
                        <td>${datos[c].cantidad}</td>
                        <td>${(datos[c].descuento != "")?datos[c].descuento:"-"}</td>
                        <td>${datos[c].total}</td>
                        <td>${datos[c].fecha_emision}</td>
                        <td>${(datos[c].estado)?'Activo':'Inactivo'}</td>
                    </div>
                    <div id='row-actions'>
                        <td>
                            <form method='POST' id='editForm'>
                                <input type='text' name='id_articulo' value='${datos[c].id_venta}' hidden>
                                <input type='submit' class='btn-table' value='Modificar' id='btn-editar'>
                            </form>
                        </td>
                        <td>
                            <form method='POST' action='stock_acciones.php' id='deleteForm${datos[c].id_venta}' >
                                <input type='text' name='id_articulo' value='${datos[c].id_venta}' hidden>
                            </form>
                            <button id='btn-desactivar' class='btn-table' onclick=\"desactivar(${datos[c].id_venta});\" >Anular</button>
                        </td>
                    </div>
                </tr>
                  `;
                c++;
            }
        }
    }
    xhttp.open('GET', '../api/listar.php?table=ventas&search_key='+barraBusqueda.value, true);
    xhttp.send();

}


if (document.getElementById("newClientModal")){
    let modal = document.getElementById("newClientModal");
    let btnclose = document.getElementById("closeBtn");
    let btnNewCli = document.getElementById("newClientBtn");

    btnNewCli.addEventListener('click', function (event) {
        event.preventDefault();
        modal.style.display = "block";
    });

    btnclose.addEventListener('click', function(){
        modal.style.display = "none";
    });

   window.addEventListener("click", function(event){
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
}