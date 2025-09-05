<?php
 
namespace Etec\Movimentacoes\Model;

class bancodedados
{
    private \PDO $conexao;

    public function __construct()
    {
        $this->conexao = new \PDO("mysql:host=localhost;dbname=BANCOG07_B", "GRUPO07_B", "Senha07!");
    }

    public function salvarCategoria(CATEGORIAS $u)
    {
        $insertCategoria = $this->conexao->prepare("INSERT INTO CATEGORIAS(CTGCODIGO, CTGSUBCATEG, CTGNOME) VALUES (:ctgcodigo, :ctgsubcateg, :ctgnome)");

        $insertCategoria->bindValue(":ctgcodigo", $u->ctgcodigo);
        $insertCategoria->bindValue(":ctgsubcateg", $u->ctgsubcateg);
        $insertCategoria->bindValue(":ctgnome", $u->ctgnome);

        // executa o comando
        return $insertUsuario->execute();
    }

    public function salvarCidades(CIDADES $u)
    {
        $insertCidade = $this->conexao->prepare("INSERT INTO CIDADES(CDDCODIGO, CDDNOME, CDDESTADO) VALUES (:cddcodigo, :cddnome, :cddestado)");

        $insertCidade->bindValue(":cddcodigo", $u->cddcodigo);
        $insertCidade->bindValue(":cddnome", $u->cddnome);
        $insertCidade->bindValue(":cddestado", $u->cddestado);

        // executa o comando
        return $insertCidade->execute();
    }

    public function salvarClientes(CLIENTES $u)
    {
        $insertCliente = $this->conexao->prepare("INSERT INTO CLIENTES(CLICODIGO, CLICPF, CLINOME, CLIDTNASC, CLIEMAIL, CLITEL1, CLITEL2, CLISENHA) VALUES (:clicodigo, :clicpf, :clinome, :clidtnasc, :cliemail, :clitel1, :clitel2, :clisenha)");

        $insertCliente->bindValue(":clicodigo", $u->clicodigo);
        $insertCliente->bindValue(":clicpf", $u->clicpf);
        $insertCliente->bindValue(":clinome", $u->clinome);
        $insertCliente->bindValue(":clidtnasc", $u->clidtnasc);
        $insertCliente->bindValue(":cliemail", $u->cliemail);
        $insertCliente->bindValue(":clitel1", $u->clitel1);
        $insertCliente->bindValue(":clitel2", $u->clitel2);
        $insertCliente->bindValue(":clisenha", $u->clisenha);

        // executa o comando
        return $insertCliente->execute();
    }

    public function salvarEndereco(ENDERECOS $u)
    {
        $insertEndereco = $this->conexao->prepare("INSERT INTO ENDERECOS(ENDCEP, ENDLOGRAD, ENDBAIRRO, ENDCIDADE) VALUES (:endcep, :endlograd, :endbairro, :endcidade)");

        $insertEndereco->bindValue(":endcep", $u->endcep);
        $insertEndereco->bindValue(":endlograd", $u->endlograd);
        $insertEndereco->bindValue(":endbairro", $u->endbairro);
        $insertEndereco->bindValue(":endcidade", $u->endcidade);

        // executa o comando
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

        // executa o comando
        return $insertEnd_clientes->execute();
    }

    public function salvarEstados(ESTADOS $u)
    {
        $insertEstados = $this->conexao->prepare("INSERT INTO ESTADOS(STDCODIGO, STDNOME, STDREGIAO) VALUES (:stdcodigo, :stdnome, :stdregiao)");

        $insertEstados->bindValue(":stdcodigo", $u->stdcodigo);
        $insertEstados->bindValue(":stdnome", $u->stdnome);
        $insertEstados->bindValue(":stdregiao", $u->stdregiao);

        // executa o comando
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

        // executa o comando
        return $insertEstoque->execute();
    }
}