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

$roteador -> post("/clientes", "principal:clientes_salvar");
$roteador -> post("/end_clientes", "principal:end_clientes_salvar");
$roteador -> post("/estoques", "principal:estoques_salvar");
$roteador -> post("/categorias", "principal:categorias_salvar");
$roteador -> post("/enderecos", "principal:enderecos_salvar");
$roteador -> post("/fornecedores", "principal:fornecedores_salvar");
$roteador->post("/cidades", "principal:cidades_salvar");
$roteador -> post("/estados", "principal:estados_salvar");
$roteador -> post("/produtos", "principal:produtos_salvar");
$roteador -> post("/movimentacoes", "principal:movimentacoes_salvar");
$roteador -> post("/tipos_mov", "principal:tipos_mov_salvar");

$roteador -> dispatch();