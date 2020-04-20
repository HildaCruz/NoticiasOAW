$(document).ready( function() {
    $("#navbar").load("php/sections/navbar.php");
    $("#sidebar").load("php/sections/sidebar.php");
    $("#articles").load("php/sections/articles.php");
});

function buscarNoticia(palabra){
    $.ajax({
        url: 'php/busqueda.php',
        data: {
            palabra: palabra
        },
        type: 'POST',
        success: function (response) {
            var content = document.getElementById("articles");
            content.innerHTML = response;
            //$("#articles").innerHTML.replace(data);
            //alert("chicheñol");
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

/*function añadirURL(link){
    $.ajax({
        url: 'php/LinksRSS.php',
        data: {
            link: link
        },
        type: 'POST',
        success:function (data){
            //alert("");
            location.href="../index.html";
        }
    })
}*/