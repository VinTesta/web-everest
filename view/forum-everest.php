<?php
require_once("../layout/cabecalho.php");
?>
<div class="container about-us-container">
    <div class="row">
      <div class="col-md-12 mb-4">
        <h1 class="mb-4">Fórum Everest</h1>
        <h3 class="mb-3">Bem-vindo ao Fórum Everest!!</h3>
        <h5 class="mb-3">
          Aqui discutimos os principais assuntos referentes as nossas aplicações. Você pode se logar ou fazer uma pergunta anônima e nossa equipe irá
          analisar e atende-lo o mais rapido possível
        </h5>
        <p><i><b>Pedimos que todos se respeitem e que criem um ambiente saúdavel de ajuda e compreensão</b></i></p>
        <p><i><b>Att. Equipe Everest</b></i></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mb-4">
        Você também pode <a href="#ancoraNovoChamado" class="btn btn-info">Abrir novo chamado</a>
      </div>
    </div>
    <div class="row">
      <div class="class-md-12 mb-5" id="listaChamados">
      </div>
    </div>
    <a name="ancoraNovoChamado"></a>
    <div class="row">
      <div class="col-md-12 mb-4">
      <div class="card">
        <h5 class="card-header">Abrir Chamado</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 mb-4">
              <label for="tituloNovoChamado">Título do Chamado:</label>
              <input type="text" class="form-control force-check" id="tituloNovoChamado">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4">
              <label for="emailNovoChamado">Seu melhor e-mail para contato:</label>
              <input type="email" class="form-control force-check" id="emailNovoChamado">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-4">
              <label for="descricaoNovoChamado">Descreva o ocorrido:</label>
              <textarea id="descricaoNovoChamado" class="form-control force-check" cols="30" rows="10"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-4">
              <button class="btn btn-primary" id="btnAbrirChamado">Abrir chamado</button>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
</div>
<?php
    require_once("../layout/rodape.php");
?>