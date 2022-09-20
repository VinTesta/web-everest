<?php
require_once("../util/dao-loader.php");

try {
  $chamadoDao = new ChamadoDao($conexao);

  $listaChamado = $chamadoDao->listaChamadosAbertos();

  echo json_encode($listaChamado);

} catch(Exception $e) {
  var_dump($conexao->erroInfo());
}
?>
