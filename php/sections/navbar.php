<div>
    <h1><a class="home" href="index.html">Noticias RSS</a></h1>
    <h5>(Really Simple Syndication)</h5>
</div>

<form action="php/LinksRSS.php" method="post">
    <input type="text" id="_url" name="url" style="width: 450px" placeholder="Para añadir un RSS inserte el url aquí">
    <button type="submit" class="btn btn-dark">Añadir</button>
</form>
<button class="btn btn-dark" onclick="actualizarNoticias()">Actualizar noticias</button>