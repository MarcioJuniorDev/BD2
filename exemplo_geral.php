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
$nQtdeReg = 20;

if(isset($_GET['txtNome']))
{
    if(strlen(trim($_GET['txtNome'])) != 0)
    {
        if($_GET['txtCod'] != 0)
        {
            $cSQL = "UPDATE EXERCICIO SET EXRDESCRICAO = '". trim($_GET['txtNome']) . "' WHERE EXRCODIGO = " . $_GET['txtCod'];
            $oCon->exec($cSQL);
        }
        else
        {
        $cSQL = "INSERT INTO EXERCICIO(EXRDESCRICAO) VALUES('" . trim($_GET['txtNome']) . "')";
        $oCon->exec($cSQL);
        }
    }
}

if(isset($_GET['radSelecao']))
{
    $cSQL = "DELETE FROM EXERCICIO WHERE EXRCODIGO = " . ((int)$_GET['radSelecao']);
    $oCon->exec($cSQL);
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
	<body>
		<form>
			 <!-- hidden esconde o input, algo que o usuário não precisa ver, mas ainda aparece no código fonte -->
			<input type="hidden" name="txtCod" value="<?= $nCod ?>"/>
			<input name="txtNome" value="<?= $cNome ?>"/>
		</form>
		
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
                    $cSQL = "SELECT * FROM EXERCICIO ORDER BY EXRDATAINCLUSAO DESC LIMIT " . ($_SESSION['PAGINA'] * $nQtdeReg) . ", $nQtdeReg";  
                    foreach($oCon->query($cSQL, PDO::FETCH_ASSOC) as $vReg)
                    echo '<tr>' .
                        '  <td><input type="radio" name="radSelecao" value="' . $vReg['EXRCODIGO'] . '"</td>' .
                        '  <td><a href="?CODALT=' . $vReg['EXRCODIGO'] . '">' . $vReg['EXRDESCRICAO'] . '</a></td>' .
                        '  <td>' . $vReg['EXRDATAINCLUSAO'] . '</td>' .
                        '</tr>';
                    ?>
                </tbody>
            </table>
            <button name="btnExcluir" type="button" onclick="if (confirm('Deseja realmente excluir o registro?\nEssa operação não poderá ser desfeita')) this.parentElement.submit()">Remover seleção</button>
            <!-- "?" chama a própria página -->
            <a href="?MUDAPAG=-1">Página Anterior</a>
            <a href="?MUDAPAG=1">Próxima página</a>
        </form>
	</body>
</html>