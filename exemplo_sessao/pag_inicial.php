<?php
    // inicia uma sessão a partir dos cookies no navegador
    session_start();

    if (!isset($_SESSION['ACESSO']))
    {
        header('location: login.htm');
    }
?>

<html>
    <body>
        <!-- imagem -->
        <img src="https://picsum.photos/800/600" alt="">
    </body>
</html>