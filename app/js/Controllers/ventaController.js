/*if($('#search-box') != null){
    $("#search-box").keyup(function (e) { 
        
    });
}*/

$(document).ready(function () {
});

//Campo de busqueda de cliente
$('#cliente').autocomplete({
    source: function (request, response) {  
        $.ajax({
            type: "get",
            url: "../api/listar.php",
            data: {table:'clientes',search_key:request.term},
            //dataType: "dataType",
            success: function (data) {
                let dataJson = JSON.parse(data).map(function (datos) { return datos.cliente });
                response(dataJson);
                console.log(dataJson);
            }
        });
    },
    minLength:1,
    select: function (event, ui) { 
        console.log(ui.item.label);
        alert("selecciono: "+ ui.item.label);
    }
});

//Campo de busqueda de productos
$('#producto').autocomplete({
    source: function (request, response) {  
        $.ajax({
            type: "get",
            url: "../api/listar.php",
            data: {table:'stock',search_key:request.term},
            //dataType: "dataType",
            success: function (data) {
                let dataJson = JSON.parse(data).map(function (datos) { return datos.descripcion });
                response(dataJson);
                console.log(dataJson);
            }
        });
    },
    minLength:1,
    select: function (event, ui) { 
        console.log(ui.item.label);
        alert("Selecciono: "+ ui.item.label);
    }
});

//Campo de busqueda de productos
$('#tipo_venta').autocomplete({
    source: function (request, response) {  
        $.ajax({
            type: "get",
            url: "../api/listar.php",
            data: {table:'tipo_venta'},
            //dataType: "dataType",
            success: function (data) {
                let dataJson = JSON.parse(data).map(function (datos) { return datos.descripcion });
                response(dataJson);
                console.log(data);
            }
        });
    },
    minLength:1,
    select: function (event, ui) { 
        console.log(ui.item.label);
        alert("Selecciono: "+ ui.item.label);
    }
});