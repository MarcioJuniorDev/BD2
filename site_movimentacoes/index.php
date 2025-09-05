<?php
require_once 'vendor/autoload.php';

// endereço do site
const URL = "http://localhost";

// cria o roteador
$roteador = new CoffeeCode\Router\Router(URL);
$roteador -> namespace("Etec\Movimentacoes\Controller");

// rota
$roteador -> group(null);
$roteador -> get("/", "principal:inicio");
$roteador -> get("/clientes", "principal:clientes");
$roteador -> get("/end_clientes", "principal:end_clientes");
$roteador -> get("/estoques", "principal:estoques");
$roteador -> get("/categorias", "principal:categorias");
$roteador -> get("/enderecos", "principal:enderecos");
$roteador -> get("/fornecedores", "principal:fornecedores");
$roteador -> get("/cidades", "principal:cidades");
$roteador -> get("/estados", "principal:estados");
$roteador -> get("/produtos", "principal:produtos");
$roteador -> get("/movimentacoes", "principal:movimentacoes");
$roteador -> get("/tipos_mov", "principal:tipos_mov");

$roteador -> dispatch();