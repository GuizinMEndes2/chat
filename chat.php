<?php
session_start();
Header("Content-Type: application/json; charset=UTF-8"); // Define o cabeçalho como JSON
$resposta = new stdClass;
$resposta->status = 'ok';
$resposta->mensagens = [];
$usuario = new stdClass;
$usuario->nome = 'Guizin';
$usuario->cor_texto = '#afa';
$usuario->cor_fundo = '#faf';
$usuario->id = ' gadeji';
$resposta->usuarios = [$usuario];
echo(json_encode($resposta));
?>
