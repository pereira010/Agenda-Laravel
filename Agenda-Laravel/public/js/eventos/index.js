
$(function () {

    $('.excluir_evento').on('click', function () {
        const id = $(this).data('id')
        
        swal({
            'title': 'Excluir Evento',
            'text': 'Está ação não poderá ser revertida',
            'type': 'warning',
            'confirmButtonText': 'OK',
            'cancelButtonText': 'Cancelar',
            'showCancelButton': true
        }).then( () => {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                url: `/eventos/delete/${id}`,
                type: 'delete',
                success: function (data) {
                    swal(data).then( () => {
                        location.reload()
                    });
                },
                error: function (data) {
                    swal(data)
                    return false;
                }
            })
        })

    })

})