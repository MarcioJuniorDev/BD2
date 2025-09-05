<?php
 
namespace Etec\Movimentacoes\Model;
 
class CATEGORIAS
{
	public int $ctgcodigo;
	public int $ctgsubcateg;
	public string $ctgnome;
}
 
class CIDADES
{
	public int $cddcodigo;
	public string $cddnome;
	public string $cddestado;
}
 
class CLIENTES
{
	public int $clicodigo;
	public string $clicpf;
	public string $clinome;
	public $clidtnasc;
	public string $cliemail;
	public string $clitel1;
	public string $clitel2;
	public string $clisenha;
}
 
class ENDERECOS
{
	public string $endcep;
	public string $endlograd;
	public string $endbairro;
	public int $endcidade;
}
 
class END_CLIENTES
{
	public string $edccep;
	public int $edccliente;
	public int $edctipo;
	public string $edcnumero;
	public string $edcompl;
}
 
class ESTADOS
{
	public string $stdcodigo;
	public string $stdnome;
	public int $stdregiao;
}
 
class ESTOQUES
{
	public string $stqreferencia;
	public int $stqproduto;
	public string $stqlote;
	public $stqdtvalid;
	public int $stqquantidade;
}
 
class FORNECEDORES
{
	public int $frncodigo;
	public string $frncnpj;
	public string $frnrazaosocial;
	public string $frnfantasia;
	public string $frnendereco;
	public string $frnendnum;
	public string $frnendcompl;
}
 
class MOVIMENTACOES
{
	public int $mvtcodigo;
	public $mvtdata;
	public int $mvttipo;
	public int $mvtproduto;
	public int $mvtqtde;
	public string $mvtlote;
}
 
class PRODUTOS
{
	public int $prdcodigo;
	public string $prdtitulo;
	public string $prddescricao;
	public float $prdvlrunit;
	public int $prdcategoria;
	public int $prdfornecedor;
	public int $prdativo;
}
 
class TIPOS_MOV
{
	public int $tpmcodigo;
	public string $tpmacao;
	public string $tpmdescricao;
}