<?php

require_once("../util/dao-loader.php");

try {
  $conexao->beginTransaction();

  $chamadoDao = new ChamadoDao($conexao);

  $usuario = new Usuario();
  $titulo = $_POST["titulo"];
  $descricao = $_POST["descricao"];
  $email = $_POST["email"];
  
  $chamado = new Chamado($titulo, '', $descricao, $email);
  $insercaoChamado = $chamadoDao->insereChamado($chamado);

  echo json_encode(array("mensagem" => "Chamado inserido com sucesso!", "idchamado" => $insercaoChamado));

  $conexao->commit();
} catch(MySqlException $e) {
  $conexao->rollback();
  var_dump($e);
}