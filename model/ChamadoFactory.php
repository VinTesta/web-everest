<?php

class ChamadoFactory {
  private $usuario;
  private $titulo;
  private $data;
  private $descricao;
  private $status;
  private $email;

  function criaChamado($params) {
    $this->titulo = !empty($params['titulo']) ? $params['titulo'] : null;
    $this->data = !empty($params['data']) ? $params['data'] : null;
    $this->descricao = !empty($params['descricao']) ? $params['descricao'] : null;
    $this->status = !empty($params['status']) ? $params['status'] : null;
    $this->email = !empty($params['email']) ? $params['email'] : null;
    $this->usuario = !empty($params['usuario']) ? $params['usuario'] : null;

    return new Chamado($this->titulo, $this->data, $this->descricao, $this->email, $this->usuario, $this->status);
  }
}