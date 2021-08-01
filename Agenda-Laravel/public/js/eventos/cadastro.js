$(document).ready(function () {


  //Crie está função para validar qualquer campo no formulario de endereco
  const validaCamposEndereco = () => {
     if(!$("input[name=localidade]").val()) {
       swal(`Campo Vazio`, `O campo localidade precisa ser preenchido`, 'warning');
       return false
     }
     if(!$("input[name=numero").val()) {
      swal(`Campo Vazio`, `O campo número precisa ser preenchido`, 'warning');
      return false
    }
    if(!$("input[name=rua]").val()) {
      swal(`Campo Vazio`, `O campo rua precisa ser preenchido`, 'warning');
      return false
    }

    if(!$("select[name=zona]").val()) {
      swal(`Campo Vazio`, `O campo zona precisa ser preenchido`, 'warning');
      return false
    }

    return true;
  }

  $('#salvar_endereco').on('click', function () {
    if(validaCamposEndereco()) {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        const dados = {
          'localidade': $("input[name=localidade]").val(),
          'rua': $("input[name=rua]").val(),
          'numero': $("input[name=numero]").val(),
          'id_user': $("input[name=id_user]").val(),
          'zona': $("select[name=zona]").val()
        }


        $.ajax({
           url: `/endereco/store`,
           type: 'post',
           data: dados,
           success: function (data) {
              swal(data)
              .then( () => {
                if($(`input[name='qtd_endereco']`).val() <= 0) location.reload();
                else $('#cancelar_endereco').click()
               })

           },
           error: function (data) {
             swal(data)
             return false;
           }
        })
      }

  })

  $(`select[name='id_endereco']`).on('focus', function () {
    $('#id_endereco').children().remove()
    $.ajax({
      url: '/endereco/listar-enderecos',
      type: 'get',
      success: function (data) {
        data.filter(item => {
            $('#id_endereco').append(`<option value="${item['id']}"> <strong>Local: </strong> ${item['localidade']} - <strong>N°</strong> ${item['numero']} - <strong>Rua: </strong> ${item['rua']} </option>`)
        })
      },
      error: function (data) {
        swal(`Error`, `Não foi possível verificar`, 'error');
      }
    })
  })

})
