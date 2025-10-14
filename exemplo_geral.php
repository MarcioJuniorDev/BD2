<?php
// inicia a sessão, pegando os dados do usuário por meio dos "cookies" do navegador
session_start();

// verifica se existe a página. se não, cria a variável. Na prática, essa verificação testa se o usuário já entrou no site ou não.
if (!isset($_SESSION['PAGINA']))
{
    $_SESSION['PAGINA'] = 0;
}

// verifica se o parâmetro "MUDAPAG" foi enviada. se sim, adiciona o parâmetro na página, variável que controla a indexação dos selects.
if(isset($_GET['MUDAPAG']))
{
    $_SESSION['PAGINA'] += (int)$_GET['MUDAPAG'];
}

// conexão com o banco de dados
$oCon = new PDO('mysql:host=localhost; dbname=BANCOCOMUM', 'Aluno2DS', 'SenhaBD2');

// variáveis
// - campos do banco de dados que aparecem para o usuário
$nCod = 0;
$cNome = "";
// - quantidade de registros que aparecem em cada página
$nQtdeReg = 20;

// verifica se existe a variável "txtNome" nos dados enviados pelo formulário
if(isset($_GET['txtNome']))
{
	// retira os espaços do começo e fim e verifica se a quantidade de caracteres (strlen) é diferente de 0, assim sabemos se existe ou não algum texto em txtNome
    if(strlen(trim($_GET['txtNome'])) != 0)
    {
		// a variavel txtCod inicia como 0. se ela for diferente disso, quer dizer que o usuário fez uma alteração nela e que quer mudar algum registro no banco de dados
        if($_GET['txtCod'] != 0)
        {
			// atualiza a tabela EXERCICIO, colocando o texto que o usuário informou como EXRDESCRICAO nos registros que tem código igual ao código informado pelo formulário(o código é puxado a partir da descrição quando o usuário seleciona ela no html)
            $cSQL = "UPDATE EXERCICIO SET EXRDESCRICAO = '". trim($_GET['txtNome']) . "' WHERE EXRCODIGO = " . $_GET['txtCod'];
            $oCon->exec($cSQL);
        }
		// se o codigo for igual a 0, quer dizer que o usuário não está alterando nenhum registro existente, logo quer adicionar um novo registro no banco de dados.
        else
        {
			// insere no EXERCICIO o texto do usuário na EXRDESCRICAO
        	$cSQL = "INSERT INTO EXERCICIO(EXRDESCRICAO) VALUES('" . trim($_GET['txtNome']) . "')";
        	$oCon->exec($cSQL);
        }
    }
}

// veririca se radSelecao foi enviado
if(isset($_GET['radSelecao']))
{
	// deleta o registro baseado no radSelecao, que envia o código do registro selecionado
    $cSQL = "DELETE FROM EXERCICIO WHERE EXRCODIGO = " . ((int)$_GET['radSelecao']);
    $oCon->exec($cSQL);
}

// verifica se CODALT foi enviado. CODALT é enviado quando o usuário seleciona algum dos registros
if(isset($_GET['CODALT']))
{
	// pega as informações do registro selecionado a partir do CODALT, que tem valor igual ao código do registro. armazena no $cSQL
    $cSQL = "SELECT * FROM EXERCICIO WHERE EXRCODIGO = " . ((int)$_GET['CODALT']);

	// verifica se a execução do select retorna algum registro. se sim, atribui os campos do banco de dados como posições de um array de $vReg
    if ($vReg = $oCon->query($cSQL, PDO::FETCH_ASSOC)->fetch())
    {
		// atribui as variavéis que aparecem para os usuário com valor igual aos campos buscados no banco de dados. assim, o usuário tem acesso aos valores dos campos do registro que selecionou
        $nCod = $vReg['EXRCODIGO'];
        $cNome = $vReg['EXRDESCRICAO'];
    }
}
?>

<html>
	<body>
		<form>
			 <!-- hidden esconde o input, algo que o usuário não precisa ver, mas ainda aparece no código fonte -->
			<!-- usado para buscar no banco de dados -->
			<input type="hidden" name="txtCod" value="<?= $nCod ?>"/>
			<!-- valor de EXRDESCRICAO, seja ao adicionar ou selecionar/alterar um registro -->
			<input name="txtNome" value="<?= $cNome ?>"/>
		</form>
		
        <form>
            <table>
                <thead>
                    <tr>
						<!-- campos do banco de dados  -->
                        <th>#</th>			
                        <th>Nome</th>
                        <th>Dt. inclusão</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					// seleciona de x a y registros de EXERCICIO, ordenados pela data de inclusão. x é um valor igual à pagina vezes a quantidade de registros que pode mostrar (ex. a página inicial é 0*20, que resulta em 0) e significa a posição inicial do select. y é o limite, quantos registros ele mostrará após o x.
                    $cSQL = "SELECT * FROM EXERCICIO ORDER BY EXRDATAINCLUSAO DESC LIMIT " . ($_SESSION['PAGINA'] * $nQtdeReg) . ", $nQtdeReg";  
					// para cada registro do select, atribui os campos selecionados como posições do array vReg
                    foreach($oCon->query($cSQL, PDO::FETCH_ASSOC) as $vReg)
					// mostra na tela uma tabela
                    echo '<tr>' .
						// radio com o valor igual ao código do registro. assim, poderemos saber qual registro é quando esse radio for selecionado e enviado
                        '  <td><input type="radio" name="radSelecao" value="' . $vReg['EXRCODIGO'] . '"</td>' .
						// texto com o código e nome do registro. recebe um <a> para que quando o registro seja selecionado, envie para outra página. a página é a mesma (? do href), mas envia CODALT como parâmetro. Na prática, o <a> causa o recarregamento da página com um parâmetro, que quando testado executa outros blocos de código
                        '  <td><a href="?CODALT=' . $vReg['EXRCODIGO'] . '">' . $vReg['EXRDESCRICAO'] . '</a></td>' .
						// campo de tabela com a data de inclusão
                        '  <td>' . $vReg['EXRDATAINCLUSAO'] . '</td>' .
                        '</tr>';
                    ?>
                </tbody>
            </table>
			<!-- botões para ações  -->
			<!-- exclui um registro. antes disso, confirma se o usuário realmente quer deletar ele -->
            <button name="btnExcluir" type="button" onclick="if (confirm('Deseja realmente excluir o registro?\nEssa operação não poderá ser desfeita')) this.parentElement.submit()">Remover seleção</button>
            <!-- "?" chama a própria página -->
			<!-- volta uma página, com -1 no MUDAPAG (assim, PAGINA += -1) -->
            <a href="?MUDAPAG=-1">Página Anterior</a>
			<!-- avança uma página, incrementando o PÁGINA  -->
            <a href="?MUDAPAG=1">Próxima página</a>
        </form>
	</body>
</html>
