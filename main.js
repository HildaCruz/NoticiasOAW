$(document).ready(function () {
    $("#navbar").load("php/sections/navbar.html");
    $("#sidebar").load("php/sections/sidebar.php");
    $("#articles").load("php/sections/articles.php");
});

function buscarNoticia(palabra) {
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

/*function agregarRSS(url){
    var confirmar = confirm("¿Desea agregar el siguiente URL?");
    if (confirmar) {
        $.ajax({
            url: 'php/LinksRSS.php',
            data: {url: url},
            type: 'POST',
            success: function (response) {
                alert("El URL se ha grardado exitosamente");
            },
            error: function (data) {
                alert("Hubo un error en el almacenamiento del URL");
            }

        });
    }
}*/

function actualizarNoticias() {
    var confirmar = confirm("¿Desea actualizar el feed?");
    if (confirmar) {
        $.ajax({
            url: 'php/updateNews.php',
            success: function (data) {
                alert("Los artículos se han actualizado exitosamente");
                location.href = "index.html";
            },
            error: function (data) {
                alert("Hubo un error en la actualización de los articulos");
                Location.href = "index.html";
            }
        });
    }
}

