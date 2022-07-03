//Busqueda de Cobranzas
if (document.querySelector("#search-box") != null) {
    console.log("Funciona");
    document.querySelector('#search-box').addEventListener('keyup', buscarAjaxTable, true);
}



let modal = document.getElementById("myModal");
//Cargando los datos de la cobranza a la venta
function prepare_modal(id_cob, cuota, monto, fk_ven) {
    let saldo
    console.log(id_cob);
    console.log(cuota);
    console.log(monto);
    console.log(fk_ven);
    getSaldoVen(fk_ven);

    document.getElementById("fcuota").value = cuota;
    document.getElementById("fmonto").value = monto;
    document.getElementById("fid").value = id_cob;

    modal.style.display = "block";
}
//consiguiendo el saldo
function getSaldoVen(id_ven) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            console.log(datos);
            document.getElementById("fsaldo").value = datos[0].saldo;
        }
    }
    xhttp.open('GET', '../api/listar.php?table=cobranzas&saldo_ven=' + id_ven, true);
    xhttp.send();

}

//Busqueda de los datos
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
                        <td>${datos[c].cliente}</td>
                        <td>${datos[c].cuota_nro}</td>
                        <td>${datos[c].monto}</td>
                        <td>${datos[c].direccion}</td>
                        <td>${datos[c].fecha_cobro}</td>
                        <td>${datos[c].mora}</td>
                        <td><button class=\"addNew\" onclick=\"prepare_modal(${datos[c].id_cobranza},${datos[c].cuota_nro},${datos[c].monto}, ${datos[c].fk_venta})\">Cobrar</button></td>
                    </div>
                </tr>`;
                c++;
            }
        }
    }
    xhttp.open('GET', '../api/listar.php?table=cobranzas&search_key=' + barraBusqueda.value, true);
    xhttp.send();

}

if (document.getElementById("btn-aplazo-cobro")){
    let btn_aplazo = document.getElementById("btn-aplazo-cobro");
    btn_aplazo.addEventListener('click', function(event){
        event.preventDefault();
        let form = document.getElementById("cob_form");

        formField = document.createElement('input');
        formField.type = 'hidden';
        formField.name = 'aplazo';
        formField.value = 'si';
    
        form.appendChild(formField);
        form.submit(); 
    });
}