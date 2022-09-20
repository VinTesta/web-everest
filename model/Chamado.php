<?php

class Chamado {
  private $usuario;
  private $titulo;
  private $data;
  private $descricao;
  private $status;
  private $email;

  function __construct($titulo, $data, $descricao, $email, Usuario $usuario = null, $status = '0') {
    if(empty($titulo)) new Exception("T�tulo inv�lido!");
    if(empty($data)) new Exception("Data inv�lida!");
    if(empty($descricao)) new Exception("Descri��o inv�lida!");
    if(empty($email)) new Exception("Email inv�lido!");
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