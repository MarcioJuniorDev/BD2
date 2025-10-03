<?php
    $oCon = new PDO('mysql:host=localhost; dbname=BANCOCOMUM', 'Aluno2DS', 'SenhaBD2');

    $cSQL = "SELECT 0 FROM USUARIOS WHERE USRLOGIN = 'Administrador' AND USRSENHA = MD5('12345')";

    if ($vReg = $oCon->query($cSQL)->fetch())
    {
        echo 'boa';
    }
    else
    {
        echo 'burro burro';
    }
?>