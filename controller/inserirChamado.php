<?php

require_once("../util/dao-loader.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

try {
  $conexao->beginTransaction();

  $chamadoDao = new ChamadoDao($conexao);

  $usuario = new Usuario();
  $titulo = $_POST["titulo"];
  $descricao = $_POST["descricao"];
  $email = $_POST["email"];
  
  $chamado = new Chamado($titulo, '', $descricao, $email);
  $insercaoChamado = $chamadoDao->insereChamado($chamado);

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->Username = "everestmensageiro@gmail.com";
  $mail->Password = 'mfvqjydezxkjaees';
  $mail->Port = 465;

  $mail->setFrom("everestmensageiro@gmail.com");
  $mail->addAddress($email);
  $mail->addBCC("everestmensageiro@gmail.com");

  $mail->isHTML(true);
  $mail->Subject = 'Interação Chamado Nº '.$insercaoChamado;
  $mail->Body    = '<h4>Olá <b>Escalador</b>! Somos da equipe Everest e é um prazer que tenha entrado em contato!</h4>
  <br>
  <br>
  <h5>
    Vimos que entrou em contato para solicitar suporte a um erro.<br>
    Esse e-mail é para apenas para dizer que recebemos seu contato e estamos avaliando seu chamado.
  </h5>
  <br>
  <br>
  <p>
    Fique tranquilo, beba uma boa limonada e aproveite para dar uma olhada em outras soluções que desenvolvemos.<br>
    Vamos corrigir seu erro antes que consiga dizer <b>Paraclorobenzilpirroliginonetilbenzimidazol</b>.
  </p>
  <br><br>
  
  <div class="text-chamado">
    <h3>Informações sobre o chamado:</h3>
    <h5><b>Titulo:</b> '.$titulo.'</h5>
    <h5><b>E-mail:</b> '.$email.'</h5>
    <h5><b>Descrição:</b> '.$descricao.'</h5>
  </div>
  <p><i>Caso ache que esse e-mail veio por engano, apenas desconsidere essa mensagem</i></p>';

  if(!$mail->send()) {
    throw new Exception("Error on sent e-mail", 1);
  }

  echo json_encode(array("mensagem" => "Chamado inserido com sucesso!", "idchamado" => $insercaoChamado));

  $conexao->commit();
} catch(MySqlException $e) {
  $conexao->rollback();
  var_dump($e);
}