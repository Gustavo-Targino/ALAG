<?php

   include('validaLogin.php');

?>

<h1>Olá, <?=$_SESSION['nome'];?>!</h1>

<p>

    <a href="?pg=home" class="btn">Home</a>
    <a href="?pg=denuncia" class="btn">Denunciar alagamento</a>
    <a href="?pg=sair" class="btn">Sair</a>

</p>