var campos = 1;
function quitarCampo(iddiv){
    var eliminar = document.getElementById("divselect_" + iddiv);
    var eliminar2 = document.getElementById("divcampo_" + iddiv);
    var eliminar3 = document.getElementById("divquitar_" + iddiv);
    var contenedor= document.getElementById("selectcontainer");
    contenedor.removeChild(eliminar);
    contenedor.removeChild(eliminar2);
    contenedor.removeChild(eliminar3);
}

function addField(){
    var options= "";
    var products = document.getElementById('ProductSelect').options;
    for (var index = 0; index < products.length; ++index) {
        options = options + "<option value="+products[index].value+">"+products[index].innerHTML+"</option>" ;

    }
    campos = campos + 1;
    var NvoSelect= document.createElement("div");
    NvoSelect.id= "divselect_"+(campos);
    NvoSelect.className= 'col-lg-6';
    NvoSelect.innerHTML ="<label for=productos"+campos+">Seleccione un Producto :</label>"+
        "<select name='productos[]' id=productos"+campos+" class=form-control>"+options


          +  "</select>"

        ;

    var NvoCampo = document.createElement("div");
    NvoCampo.id= "divcampo_"+(campos);
    NvoCampo.className= 'col-lg-4';
    NvoCampo.innerHTML ="<label for=amount"+campos+">Número de Hectáreas :</label>"+
        "<input class='formText form-control' name='amount[]' type=text id=amount"+campos+">";



    var NvoQuitar = document.createElement("div");
    NvoQuitar.id= "divquitar_"+(campos);
    NvoQuitar.className= 'col-lg-2';
    NvoQuitar.innerHTML ="<label>Quitar Campo</label>"+

    "<button type=button class='btn btn-danger' onclick='quitarCampo(" + campos +");'>Eliminar</button>";

    var contenedor= document.getElementById("selectcontainer");
    contenedor.appendChild(NvoSelect);
    contenedor.appendChild(NvoCampo);
    contenedor.appendChild(NvoQuitar);

    var elem = document.getElementById("count");
    elem.value = campos;
}

$(document).ready(function(){

    $('.numbersOnly').keyup(function () {
        if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        }
    });


});