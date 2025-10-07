<?php
session_start();
$oCon = new PDO('mysql:host=localhost; dbname=BANCOCOMUM', 'Aluno2DS', 'SenhaBD2');

if(isset($_GET['txtNome']))
    if(strlen(trim($_GET['txtNome'])) != 0)
    {
        $cSQL = "INSERT INTO EXERCICIO(EXRDESCRICAO) VALUES('" . trim($_GET['txtNome']) . "')";
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
                $cSQL = "SELECT * FROM EXERCICIO";  
                foreach($oCon->query($cSQL, PDO::FETCH_ASSOC) as $vReg)
                echo '<tr>' .
                     '  <td>' . $vReg['EXRCODIGO'] . '</td>' .
                     '  <td><a href="?CODALT=' . $vReg['EXRCODIGO'] . '">' . $vReg['EXRDESCRICAO'] . '</a></td>' .
                     '  <td>' . $vReg['EXRDATAINCLUSAO'] . '</td>' .
                     '</tr>';
                ?>
			</tbody>
		</table>
	</body>
</html>