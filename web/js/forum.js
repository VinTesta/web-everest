$(document).ready(() => {


  if($("#listaChamados").is(":visible")) {
    geraListaChamados();
  }

  async function geraListaChamados() {
    const listaChamados = await buscaChamados();
    
    listaChamados.forEach(element => {
      $("#listaChamados").append(geraCorpoChamado(element));
    });
  }

  function geraCorpoChamado(chamado) {
    return `<div class="row align-center justify-content-center">
          <div class="col-md-9 mb-4 mt-4">
          <div class="card">
            <div class="card-header">
              Anônimo
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <i class="fa-solid fa-arrow-up"></i> 0
                  <br>
                  <i class="fa-solid fa-reply"></i> 0
                  <br>
                  <i class="fa-sharp fa-solid fa-eye"></i> 0
                </div>
                <div class="col-md-9">
                  <h5 class="card-title">${chamado.titulo}</h5>
                  <p class="card-textt">${chamado.descricao}</p>
                </div>
              </div>
            </div>
            <div class="card-footer text-muted">
              <i>${chamado.data}</i>
            </div>
          </div>
          </div>
        </div>
        <hr>`;
  }

  function buscaChamados() {
    return new Promise(resolve => {
      $.ajax({
        url: "../controller/buscaChamadosForum.php",
        data: {},
        type: "POST",
        success: res => resolve(JSON.parse(res))
      });
    })
  }

  $(document).on("click", "#btnAbrirChamado", async (e) => {
    e.preventDefault();

    $("#btnAbrirChamado").attr("disabled", "");

    if(!validaCamposForm([[".force-check"]])) {
      $("#" + toastList[0]._element.id + " .toast-body").html("Há campos inválidos, preencha-os para prosseguir!")  
      toastList[0].show();
      return;
    }

    const chamado = {
      titulo: $("#tituloNovoChamado").val(),
      descricao: $("#emailNovoChamado").val(),
      email: $("#descricaoNovoChamado").val()
    };

    const resultado = await inserirChamado(chamado);

    if(resultado.idchamado > 0)  {
      $("#" + toastList[0]._element.id + " .toast-body").html(`
        Chamado aberto com sucesso! Nossa equipe irá analisa-lo e entraremos em contato em breve! <br> <b>Muito obrigado pelo contato!<b>`);
      $("#tituloNovoChamado").val("");
      $("#emailNovoChamado").val("");
      $("#descricaoNovoChamado").val("");
    } else {
      $("#" + toastList[0]._element.id + " .toast-body").html(`
      Houve um erro ao abrir o chamado! Verifique se todos os campos estão preenchidos corretamente!<b>`);
    }

    $("#btnAbrirChamado").removeAttr("disabled");
    toastList[0].show();
  })

  function inserirChamado(chamado) {
    return new Promise(resolve => {
      $.ajax({
        url: "../controller/inserirChamado.php",
        data: chamado,
        type: "POST",
        success: res => resolve(JSON.parse(res))
      })
    })
  }

  function validaCamposForm(campos) {

    var flag = [];

    $.each(campos, function (index, campo) {
      var idCampo = campo[0];

      if (idCampo[0] == '.') { // tratamento de classes

        $(idCampo).each(function () {
          if ($(this).is(':visible') || $(this).hasClass('force-check') && !$(this).hasClass('custom-file')) {
            if ($(this).val() === '') {
              $(this).addClass('alerta');
              flag.push(1);
            } else {
              $(this).removeClass('alerta');
            }
          }
        });

      } else { // tratamento de id

        var divAlerta = campo[1] ? campo[1] : campo[0];

        var valor = $(idCampo).val();
        if ($(divAlerta).is(':visible') || $(divAlerta).hasClass('force-check')) {

          if ($(idCampo).hasClass('multiselect') || $(idCampo).attr('multiple') == 'multiple') {
            if (valor == '') {
              $(divAlerta).addClass('alerta');
              flag.push(1);
            } else {
              $(divAlerta).removeClass('alerta');
            }
          } else if ($(idCampo).hasClass('custom-file-input')) {
            var formatosAceitos = campo[2];
            var tamanhoMaximo = campo[3];

            var placeholder = $(idCampo).next('.custom-file-label').text();

            if (placeholder != 'Enviar novo Arquivo') { // insere
              if (!valor) {
                $(divAlerta).addClass('alerta');
                flag.push(1);
              } else {
                if (verificaFormatoArquivo(valor, formatosAceitos)) {
                  flag.push(1);
                  $(divAlerta).addClass('alerta');
                } else {
                  var tamanho = $(idCampo)[0].files[0].size;
                  if (tamanho > tamanhoMaximo) {
                    flag.push(1);
                    $(divAlerta).addClass('alerta');
                  } else {
                    $(divAlerta).removeClass('alerta');
                  }
                }
              }
            } else { // altera
              if (valor) {
                if (verificaFormatoArquivo(valor, formatosAceitos)) {
                  flag.push(1);
                  $(divAlerta).addClass('alerta');
                } else {
                  var tamanho = $(idCampo)[0].files[0].size;
                  if (tamanho > tamanhoMaximo) {
                    flag.push(1);
                    $(divAlerta).addClass('alerta');
                  } else {
                    $(divAlerta).removeClass('alerta');
                  }
                }
              }
            }
          } else {
            if (!valor) {
              $(divAlerta).addClass('alerta');
              flag.push(1);
            } else {
              $(divAlerta).removeClass('alerta');
            }
          }
        }
      }
    });
           
    for (var i = 0; i < flag.length; i++) {
      var achou = flag[i];
      if (achou == 1) {
        return false;
      }
    }

    return true;
  }

})