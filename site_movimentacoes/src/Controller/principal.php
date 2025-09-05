<?php
namespace Etec\Movimentacoes\Controller;

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
    
    public function categoria()
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
}