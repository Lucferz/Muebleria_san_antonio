
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