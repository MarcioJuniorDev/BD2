<?php
session_start();

if (!isset($_SESSION['PAGINA']))
{
    $_SESSION['PAGINA'] = 0;
}

if(isset($_GET['MUDAPAG']))
{
    $_SESSION['PAGINA'] += (int)$_GET['MUDAPAG'];
}

$oCon = new PDO('mysql:host=localhost; dbname=BANCOCOMUM', 'Aluno2DS', 'SenhaBD2');

$nCod = 0;
$cNome = "";
$nQtdeReg = 14;
$cTipoMensagem = "";
$cMensagem = "";

$cPesquisa = "";

if(isset($_GET['txtNome']))
{
    if(strlen(trim($_GET['txtNome'])) != 0)
    {
        if(isset($_GET['cmdGravar']))
        {
            if($_GET['txtCod'] != 0)
            {
                $cSQL = "UPDATE EXERCICIO SET EXRDESCRICAO = '". trim($_GET['txtNome']) . "' WHERE EXRCODIGO = " . $_GET['txtCod'];
                if ($oCon->exec($cSQL))
                {
                    $cTipoMensagem = "Exito";
                    $cMensagem = "Alterações realizadas com sucesso";
                }
                else
                {
                    $cTipoMensagem = "Erro";
                    $cMensagem = "Ocorreu erro ao alterar o registro: <br />" . $oCon->errorInfo()[2];
                }
            }
            else
            {
                $cSQL = "INSERT INTO EXERCICIO(EXRDESCRICAO) VALUES('" . trim($_GET['txtNome']) . "')";
                if ($oCon->exec($cSQL))
                {
                    $cTipoMensagem = "Exito";
                    $cMensagem = "Registro incluido com sucesso";
                }
                else
                {
                    $cTipoMensagem = "Erro";
                    $cMensagem = "Ocorreu erro ao incluir o registro: <br />" . $oCon->errorInfo()[2];
                }
            }
        }
        else
        {
            $cPesquisa = trim($_GET['txtNome']);
        }
    }
}

if(isset($_GET['radSelecao']))
{
    $cSQL = "DELETE FROM EXERCICIO WHERE EXRCODIGO = " . ((int)$_GET['radSelecao']);
    if ($oCon->exec($cSQL))
    {
        $cTipoMensagem = "Exito";
        $cMensagem = "Remoção realizada com sucesso";
    }
    else
    {
        $cTipoMensagem = "Erro";
        $cMensagem = "Ocorreu erro ao remover o registro: <br />" . $oCon->errorInfo()[2];
    }
}

if(isset($_GET['CODALT']))
{
    $cSQL = "SELECT * FROM EXERCICIO WHERE EXRCODIGO = " . ((int)$_GET['CODALT']);

    if ($vReg = $oCon->query($cSQL, PDO::FETCH_ASSOC)->fetch())
    {
        $nCod = $vReg['EXRCODIGO'];
        $cNome = $vReg['EXRDESCRICAO'];
    }
}
?>

<html>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap');

        *
        {
            box-sizing: border-box;
            font-family: 'Bebas Neue', monospace;
        }

        form:first-of-type
        {
            margin: 10px 4%;
            width: 90%;
        
            & > label
            {
                display: block;
            }

            & > input
            {
                width: 75%;
            }

            & > button
            {
                width: 12%;
            }
        }

        table
        {
            margin: 50px 4%;
            width: 90%;
            border: 1px double #CFCFCF;
        }

        tr:nth-child(odd)
        {
            background-color: #FCFCFC;
        }
        
        tr:nth-child(even)
        {
            background-color: #EDEDED;
        }

        table TBODY tr:hover
        {
            background-color: #3090F3;
            color: ;
        }

        th
        {
            background-color: #606060;
            color: #FFFFFF;
            font-family: 'Public Sans', sans-serif;
        }

        .Exito, .Erro
        {
            margin: 5px 4%;
            padding: 2px 10px 2px 50px;
            width: 90%;
        }

        .Exito
        {
            background-color: #CFFFCF;
            border: 1px solid #009000;
            border-left: 5px solid #009000;
        }

        .Erro
        {
            background-color: #FFCFCF;
            border: 1px solid #900000;
            border-left: 5px solid #900000;
        }
    </style>
	<body>
		<form>
            <label for>Descrição</label>
			<input type="hidden" name="txtCod" value="<?= $nCod ?>"/>
			<input name="txtNome" value="<?= $cNome ?>"/>
            <button name="cmdGravar">Gravar alterações</button>
            <button name="cmdPesquisar">Pesquisar</button>
		</form>
		
        <div id="pnlMensagem" class="<?= $cTipoMensagem ?>">
            <span><?= $cMensagem ?></span>
        </div>

        <form>
            <table>
                <thead>
                    <tr>
                        <th>#</th>			
                        <th>Nome</th>
                        <th>Dt. inclusão</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cSQL = "SELECT EXRCODIGO, EXRDESCRICAO, DATE_FORMAT(EXRDATAINCLUSAO, '%d/%m/%Y %H:%I:%S') EXRDATAINCLUSAO FROM EXERCICIO WHERE EXRDESCRICAO LIKE '%$cPesquisa%' ORDER BY EXRDATAINCLUSAO DESC LIMIT " . ($_SESSION['PAGINA'] * $nQtdeReg) . ", $nQtdeReg";  
                    foreach($oCon->query($cSQL, PDO::FETCH_ASSOC) as $vReg)
                    echo '<tr>' .
                        '  <td><input type="radio" name="radSelecao" value="' . $vReg['EXRCODIGO'] . '"</td>' .
                        '  <td><a href="?CODALT=' . $vReg['EXRCODIGO'] . '">' . $vReg['EXRDESCRICAO'] . '</a></td>' .
                        '  <td>' . $vReg['EXRDATAINCLUSAO'] . '</td>' .
                        '</tr>';
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <button name="btnExcluir" onclick="if (confirm('Deseja realmente excluir o registro?\nEssa operação não poderá ser desfeita')) this.parentElement.submit()">Remover seleção</button>
                            <a href="<?=$_SESSION['PAGINA'] == 0?' # ' : '?MUDAPAG=-1' ?>">&lt;</a>
                            <input type="number" value="<?= $_SESSION['PAGINA'] + 1 ?>" readonly>
                            <a href="?MUDAPAG=1">&gt;</a>
                        </td>
                        <td>Pronto.</td>
                    </tr>
                </tfoot>
            </table>
        </form>
	</body>
</html>