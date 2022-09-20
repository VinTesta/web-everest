<?php

class Chamado {
  private $usuario;
  private $titulo;
  private $data;
  private $descricao;
  private $status;
  private $email;

  function __construct($titulo, $data, $descricao, $email, Usuario $usuario = null, $status = '0') {
    if(empty($titulo)) new Exception("Título inválido!");
    if(empty($data)) new Exception("Data inválida!");
    if(empty($descricao)) new Exception("Descrição inválida!");
    if(empty($email)) new Exception("Email inválido!");
    $this->data = $data;
    $this->descricao = $descricao;
    $this->titulo = $titulo;
    $this->usuario = $usuario;
    $this->status = $status;
    $this->email = $email;
  }

  function getUsuario() {
    return $this->usuario;
  }

  function getTitulo() {
    return $this->titulo;
  }

  function getData() {
    return $this->data;
  }

  function getDescricao() {
    return $this->descricao;
  }

  function getEmail() {
    return $this->email;
  }

  function setUsuario($usuario) {
    $this->usuario = $usuario;
  }

  function setTitulo($titulo) {
    $this->titulo = $titulo;
  }

  function setData($data) {
    $this->data = $data;
  }

  function setDescricao($descricao) {
    $this->descricao = $descricao;
  }

  function setEmail($email) {
    $this->email = $email;
  }
}
?>