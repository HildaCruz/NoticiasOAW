$(document).ready( function() {
    $("#navbar").load("php/sections/navbar.php");
    $("#sidebar").load("php/sections/sidebar.php");
    $("#articles").load("php/sections/articles.php");
});

function buscarNoticia(palabra){
    $.ajax({
        url: 'php/busqueda.php',
        data: {palabra: palabra},
        type: 'POST',
        success: function (response) {
            $("#articles").empty().append(response);
        }

    });
}
function buscarFecha(fecha) {
    $.ajax({
        url: 'php/loadByDate.php',
        data: {fecha: fecha},
        type: 'POST',
        success: function (response) {
            $("#articles").empty().append(response);
        }

    });
}

function actualizarNoticias(){
    $.ajax({
       url: 'php/save.php',
       success:function (data) {
           alert("Los artículos se han actualizado exitosamente");
            location.href="../index.html";
       } 
    });
}

