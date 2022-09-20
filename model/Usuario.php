<?php

class Usuario {

  private $idusuario;
  private $nomeusuario;
  private $emailusuario;
  private $senhausuario;
  private $status;

  function __construct() {}

  function getIdusuario() {
    return $this->idusuario;
  }

  function getNomeUsuario() {
    return $this->nomeusuario;
  }

  function getEmailusuario() {
    return $this->emailusuario;
  }

  function getSenhausuario() {
    return $this->senhausuario;
  }

  function getStatus() {
    return $this->status;
  }

  function setIdusuario($idusuario) {
    $this->idusuario = $idusuario;
  }

  function setNomeUsuario($nomeusuario) {
    $this->nomeusuario = $nomeusuario;
  }

  function setEmailusuario($emailusuario) {
    $this->emailusuario = $emailusuario;
  }

  function setSenhausuario($senhausuario) {
    $this->senhausuario = $senhausuario;
  }

  function setStatus($status) {
    $this->status = $status;
  }
}