<?php
namespace Etec\Movimentacoes\Controller;
use Etec\Movimentacoes\Model\bancodedados;
use Etec\Movimentacoes\Model\CATEGORIAS;
use Etec\Movimentacoes\Model\CIDADES;
use Etec\Movimentacoes\Model\CLIENTES;
use Etec\Movimentacoes\Model\ENDERECOS;
use Etec\Movimentacoes\Model\END_CLIENTES;
use Etec\Movimentacoes\Model\ESTADOS;
use Etec\Movimentacoes\Model\ESTOQUES;
use Etec\Movimentacoes\Model\FORNECEDORES;
use Etec\Movimentacoes\Model\MOVIMENTACOES;
use Etec\Movimentacoes\Model\PRODUTOS;
use Etec\Movimentacoes\Model\TIPOS_MOV;

class principal
{
    private \Twig\Environment $ambiente;
    private \Twig\Loader\FilesystemLoader $carregador;
    // construtor
    public function __construct()
    {
        $this->carregador = new \Twig\Loader\FilesystemLoader("./src/View");
        $this->ambiente = new \Twig\Environment($this->carregador);
    }  

    public function inicio()
    {
        echo $this->ambiente->render("inicio.html");
    }
    
    public function clientes()
    {
        echo $this->ambiente->render("clientes.html");
    }
    public function end_clientes()
    {
        echo $this->ambiente->render("endclientes.html");
    }
    public function estoques()
    {
        echo $this->ambiente->render("estoques.html");
    }
    
    public function enderecos()
    {
        echo $this->ambiente->render("enderecos.html");
    }
    
    public function categorias()
    {
        echo $this->ambiente->render("categorias.html");
    }

    public function fornecedores()
    {
        echo $this->ambiente->render("fornecedores.html");
    }
    public function cidades()
    {
        echo $this->ambiente->render("cidades.html");
    }
    public function estados()
    {
        echo $this->ambiente->render("estados.html");
    }
    public function produtos()
    {
        echo $this->ambiente->render("produtos.html");
    }
    public function movimentacoes()
    {
        echo $this->ambiente->render("movimentacoes.html");
    }
    
    public function tipos_mov()
    {
        echo $this->ambiente->render("tiposmov.html");
    }

    public function clientes_salvar()
    {
        $cliente = new CLIENTES();

        $cliente->clicpf = $_POST['clicpf'];
        $cliente->clinome = $_POST['clinome'];
        $cliente->clidtnasc = $_POST['clidtnasc'];
        $cliente->cliemail = $_POST['cliemail'];
        $cliente->clitel1 = $_POST['clitel1'];
        $cliente->clitel2 = $_POST['clitel2'];
        $cliente->clisenha = $_POST['clisenha'];

        $bd = new bancodedados();
        $resultado = $bd->salvarClientes($cliente);
        echo $this->ambiente->render("insert-sucesso.html");
    }
    public function end_clientes_salvar()
    {
        $endcliente = new END_CLIENTES();

        $endcliente->edccep = $_POST['edccep'];
        $endcliente->edccliente = $_POST['edccliente'];
        $endcliente->edctipo = $_POST['edctipo'];
        $endcliente->edcnumero = $_POST['edcnumero'];
        $endcliente->edcompl = $_POST['edcompl'];

        $bd = new bancodedados();
        $resultado = $bd->salvarEnd_clientes($endcliente);
        echo $this->ambiente->render("insert-sucesso.html");
    }
    public function estoques_salvar()
    {
        $estoque = new ESTOQUES();

        $estoque->stqreferencia = $_POST['stqreferencia'];
        $estoque->stqproduto = (int) $_POST['stqproduto'];
        $estoque->stqlote = $_POST['stqlote'];
        $estoque->stqdtvalid = $_POST['stqdtvalid'];
        $estoque->stqquantidade = $_POST['stqquantidade'];

        $bd = new bancodedados();
        $resultado = $bd->salvarEstoque($estoque);
        echo $this->ambiente->render("insert-sucesso.html");
    }
    
    public function enderecos_salvar()
    {
        $endereco = new ENDERECOS();

        $endereco->endcep = $_POST['endcep'];
        $endereco->endlograd = $_POST['endlograd'];
        $endereco->endbairro = $_POST['endbairro'];
        $endereco->endcidade = (int)$_POST['endcidade'];

        $bd = new bancodedados();
        $resultado = $bd->salvarEndereco($endereco);
        echo $this->ambiente->render("insert-sucesso.html");
    }
    
    public function categorias_salvar()
    {
        $categoria = new CATEGORIAS();
        $categoria->ctgsubcateg = (int)$_POST['ctgsubcateg'];
        $categoria->ctgnome = $_POST['ctgnome'];

        $bd = new bancodedados();
        $resultado = $bd->salvarCategoria($categoria);
        echo $this->ambiente->render("insert-sucesso.html");
    }

    public function fornecedores_salvar()
    {
        $fornecedor = new FORNECEDORES();

        $fornecedor->frncnpj = $_POST['frncnpj'];
        $fornecedor->frnrazaosocial = $_POST['frnrazaosocial'];
        $fornecedor->frnfantasia = $_POST['frnfantasia'];
        $fornecedor->frnendereco = $_POST['frnendereco'];
        $fornecedor->frnendnum = $_POST['frnendnum'];
        $fornecedor->frnendcompl = $_POST['frnendcompl'];

        $bd = new bancodedados();
        $resultado = $bd->salvarFornecedor($fornecedor);
        echo $this->ambiente->render("insert-sucesso.html");
    }
    public function cidades_salvar()
    {
        $cidade = new CIDADES();

        $cidade->cddnome = $_POST['cddnome'];
        $cidade->cddestado = $_POST['cddestado'];

        $bd = new bancodedados();
        $resultado = $bd->salvarCidades($cidade);
        echo $this->ambiente->render("insert-sucesso.html");
    }
    public function estados_salvar()
    {
        $estado = new ESTADOS();

        $estado->stdcodigo = $_POST['stdcodigo'];
        $estado->stdnome = $_POST['stdnome'];
        $estado->stdregiao = $_POST['stdregiao'];

        $bd = new bancodedados();
        $resultado = $bd->salvarEstados($estado);
        echo $this->ambiente->render("insert-sucesso.html");
    }
    public function produtos_salvar()
    {
        $produto = new PRODUTOS();

        $produto->prdtitulo = $_POST['prdtitulo'];
        $produto->prddescricao = $_POST['prddescricao'];
        $produto->prdvlrunit = $_POST['prdvlrunit'];
        $produto->prdcategoria = (int)$_POST['prdcategoria'];
        $produto->prdfornecedor = (int) $_POST['prdfornecedor'];
        $produto->prdativo = (int)$_POST['prdativo'];

        $bd = new bancodedados();
        $resultado = $bd->salvarProdutos($produto);
        echo $this->ambiente->render("insert-sucesso.html");
    }
    public function movimentacoes_salvar()
    {
        $movimentacao = new MOVIMENTACOES();

        $movimentacao->mvtdata = $_POST['mvtdata'];
        $movimentacao->mvttipo = $_POST['mvttipo'];
        $movimentacao->mvtproduto = $_POST['mvtproduto'];
        $movimentacao->mvtqtde = $_POST['mvtqtde'];
        $movimentacao->mvtlote = $_POST['mvtlote'];

        $bd = new bancodedados();
        $resultado = $bd->salvarMovimentacao($movimentacao);
        echo $this->ambiente->render("insert-sucesso.html");
    }
    
    public function tipos_mov_salvar()
    {
        $tipo_mov = new TIPOS_MOV();

        $tipo_mov->tpmacao = $_POST['tpmacao'];
        $tipo_mov->tpmdescricao = $_POST['tpmdescricao'];

        $bd = new bancodedados();
        $resultado = $bd->salvarTipo_mov($tipo_mov);
        echo $this->ambiente->render("insert-sucesso.html");
    }
}