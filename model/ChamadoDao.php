<?php

require_once("../util/dao-loader.php");
class ChamadoDao {
  private $conexao;

  function __construct($conexao) {
    if(empty($conexao)) new Exception('Conexão inválida!');
    $this->conexao = $conexao;
  }

  function insereChamado(Chamado $chamado) {
    $query = "INSERT INTO chamado (titulo, descricao, email) VALUES (:TITULO, :DESCRICAO, :EMAIL)";

    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(":TITULO", $chamado->getTitulo());
    $stmt->bindValue(":DESCRICAO", $chamado->getDescricao());
    $stmt->bindValue(":EMAIL", $chamado->getEmail());

    $stmt->execute();
    $id_chamado = $this->conexao->lastInsertId();

    return $id_chamado;
  }

  function listaChamadosAbertos() {
    $query = "SELECT * FROM chamado WHERE status = '1' ORDER BY data DESC, idchamado ASC";
    $stmt = $this->conexao->prepare($query);
    $stmt->execute();

    $chamadoFactory = new ChamadoFactory();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
  }
}