$('.modal-excluir').on('click', function(e) {
    e.preventDefault();
    var form = $(this).parent();
    
    swal({
        title: 'Tem certeza?',
        text: 'Atenção! Esta ação não pode ser desfeita.', 
        icon: 'warning',
        buttons: true,
        buttons: ['Cancelar', 'Deletar'],
        dangerMode: true
    }).then((willDelete) => {
        if (willDelete) {
            swal('Aguarde... o registro está sendo deletado!', {
                title: 'Pronto!',
                icon: 'success',
                buttons: false
            });

            setTimeout(function() {
                form[0].submit();
            }, 2000);
        } else {
            swal('Registro não deletado!', {
                title: 'Operação cancelada!',
                icon: 'success',
            });
        }
    });
});
