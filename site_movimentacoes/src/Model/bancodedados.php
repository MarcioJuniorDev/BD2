<?php
 
namespace Etec\Movimentacoes\Model;

class bancodedados
{
    private \PDO $conexao;

    public function __construct()
    {
        $this->conexao = new \PDO("mysql:host=localhost;dbname=BD2_MOVIMENTACOES", "root", "");
    }

    public function salvarCategoria(CATEGORIAS $u)
    {
        $insertCategoria = $this->conexao->prepare("INSERT INTO CATEGORIAS(CTGSUBCATEG, CTGNOME) VALUES (:ctgsubcateg, :ctgnome)");

        $insertCategoria->bindValue(":ctgsubcateg", $u->ctgsubcateg);
        $insertCategoria->bindValue(":ctgnome", $u->ctgnome);

        return $insertCategoria->execute();
    }

    public function salvarCidades(CIDADES $u)
    {
        $insertCidade = $this->conexao->prepare("INSERT INTO CIDADES(CDDNOME, CDDESTADO) VALUES (:cddnome, :cddestado)");

        $insertCidade->bindValue(":cddnome", $u->cddnome);
        $insertCidade->bindValue(":cddestado", $u->cddestado);

        return $insertCidade->execute();
    }

    public function salvarClientes(CLIENTES $u)
    {
        $insertCliente = $this->conexao->prepare("INSERT INTO CLIENTES(CLICPF, CLINOME, CLIDTNASC, CLIEMAIL, CLITEL1, CLITEL2, CLISENHA) VALUES (:clicpf, :clinome, :clidtnasc, :cliemail, :clitel1, :clitel2, :clisenha)");

        $insertCliente->bindValue(":clicpf", $u->clicpf);
        $insertCliente->bindValue(":clinome", $u->clinome);
        $insertCliente->bindValue(":clidtnasc", $u->clidtnasc);
        $insertCliente->bindValue(":cliemail", $u->cliemail);
        $insertCliente->bindValue(":clitel1", $u->clitel1);
        $insertCliente->bindValue(":clitel2", $u->clitel2);
        $insertCliente->bindValue(":clisenha", $u->clisenha);

        return $insertCliente->execute();
    }

    public function salvarEndereco(ENDERECOS $u)
    {
        $insertEndereco = $this->conexao->prepare("INSERT INTO ENDERECOS(ENDCEP, ENDLOGRAD, ENDBAIRRO, ENDCIDADE) VALUES (:endcep, :endlograd, :endbairro, :endcidade)");

        $insertEndereco->bindValue(":endcep", $u->endcep);
        $insertEndereco->bindValue(":endlograd", $u->endlograd);
        $insertEndereco->bindValue(":endbairro", $u->endbairro);
        $insertEndereco->bindValue(":endcidade", $u->endcidade);

        return $insertEndereco->execute();
    }

    public function salvarEnd_clientes(END_CLIENTES $u)
    {   
        $insertEnd_clientes= $this->conexao->prepare("INSERT INTO END_CLIENTES(EDCCEP, EDCCLIENTE, EDCTIPO, EDCNUMERO, EDCOMPL) VALUES (:edccep, :edccliente, :edctipo, :edcnumero, :edcompl)");

        $insertEnd_clientes->bindValue(":edccep", $u->edccep);
        $insertEnd_clientes->bindValue(":edccliente", $u->edccliente);
        $insertEnd_clientes->bindValue(":edctipo", $u->edctipo);
        $insertEnd_clientes->bindValue(":edcnumero", $u->edcnumero);
        $insertEnd_clientes->bindValue(":edcompl", $u->edcompl);

        return $insertEnd_clientes->execute();
    }

    public function salvarEstados(ESTADOS $u)
    {
        $insertEstados = $this->conexao->prepare("INSERT INTO ESTADOS(STDCODIGO, STDNOME, STDREGIAO) VALUES (:stdcodigo, :stdnome, :stdregiao)");

        $insertEstados->bindValue(":stdcodigo", $u->stdcodigo);
        $insertEstados->bindValue(":stdnome", $u->stdnome);
        $insertEstados->bindValue(":stdregiao", $u->stdregiao);

        return $insertEstados->execute();
    }

    public function salvarEstoque(ESTOQUES $u)
    {
        $insertEstoque = $this->conexao->prepare("INSERT INTO ESTOQUES(STQREFERENCIA, STQPRODUTO, STQLOTE, STQDTVALID, STQQUANTIDADE) VALUES (:stqreferencia, :stqproduto, :stqlote, :stqdtvalid, :stqquantidade)");

        $insertEstoque->bindValue(":stqreferencia", $u->stqreferencia);
        $insertEstoque->bindValue(":stqproduto", $u->stqproduto);
        $insertEstoque->bindValue(":stqlote", $u->stqlote);
        $insertEstoque->bindValue(":stqdtvalid", $u->stqdtvalid);
        $insertEstoque->bindValue(":stqquantidade", $u->stqquantidade);

        return $insertEstoque->execute();
    }

    public function salvarFornecedor(FORNECEDORES $u)
    {
        $insertFornecedor = $this->conexao->prepare("INSERT INTO FORNECEDORES(FRNCNPJ, FRNRAZAOSOCIAL, FRNFANTASIA, FRNENDERECO, FRNENDNUM, FRNENDCOMPL) VALUES (:frncnpj, :frnrazaosocial, :frnfantasia, :frnendereco, :frnendnum, :frnendcompl)");

        $insertFornecedor->bindValue(":frncnpj", $u->frncnpj);
        $insertFornecedor->bindValue(":frnrazaosocial", $u->frnrazaosocial);
        $insertFornecedor->bindValue(":frnfantasia", $u->frnfantasia);
        $insertFornecedor->bindValue(":frnendereco", $u->frnendereco);
        $insertFornecedor->bindValue(":frnendnum", $u->frnendnum);
        $insertFornecedor->bindValue(":frnendcompl", $u->frnendcompl);

        return $insertFornecedor->execute();
    }

    public function salvarProdutos(PRODUTOS $u)
    {
        $insertProduto = $this->conexao->prepare("INSERT INTO PRODUTOS(PRDTITULO, PRDDESCRICAO, PRDVLRUNIT, PRDCATEGORIA, PRDFORNECEDOR, PRDATIVO) VALUES (:prdtitulo, :prddescricao, :prdvlrunit, :prdcategoria, :prdfornecedor, :prdativo)");

        $insertProduto->bindValue(":prdtitulo", $u->prdtitulo);
        $insertProduto->bindValue(":prddescricao", $u->prddescricao);
        $insertProduto->bindValue(":prdvlrunit", $u->prdvlrunit);
        $insertProduto->bindValue(":prdcategoria", $u->prdcategoria);
        $insertProduto->bindValue(":prdfornecedor", $u->prdfornecedor);
        $insertProduto->bindValue(":prdativo", $u->prdativo);
        
        return $insertProduto->execute();
    }

    public function salvarMovimentacao(MOVIMENTACOES $u)
    {
        $insertMovimentacao = $this->conexao->prepare("INSERT INTO MOVIMENTACOES(MVTDATA, MVTTIPO, MVTPRODUTO, MVTQTDE, MVTLOTE) VALUES (:mvtdata, :mvttipo, :mvtproduto, :mvtqtde, :mvtlote)");

        $insertMovimentacao->bindValue(":mvtdata", $u->mvtdata);
        $insertMovimentacao->bindValue(":mvttipo", $u->mvttipo);
        $insertMovimentacao->bindValue(":mvtproduto", $u->mvtproduto);
        $insertMovimentacao->bindValue(":mvtqtde", $u->mvtqtde);
        $insertMovimentacao->bindValue(":mvtlote", $u->mvtlote);
        
        return $insertMovimentacao->execute();
    }

    public function salvarTipo_mov(TIPOS_MOV $U)
    {
        $insertTipo_mov = $this->conexao->prepare("INSERT INTO TIPOS_MOV(TPMACAO, TPMDESCRICAO) VALUES (:tpmacao, :tpmdescricao)");

        $insertTipo_mov->bindValue(":tpmacao", $u->tpmacao);
        $insertTipo_mov->bindValue(":tpmdescricao", $u->tpmdescricao);

        return $insertTipo_mov->execute();
    }
}