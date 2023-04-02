$('.modal-estornar').on('click', function(e) {
    e.preventDefault();
    var form = $(this).parent();
    
    swal({
        title: 'Estorno de pagamento',
        text: 'Tem certeza que deseja estornar pagamento dessa mensalidade?', 
        icon: 'warning',
        buttons: true,
        buttons: ['Cancelar', 'Estornar'],
        dangerMode: true
    }).then((willDelete) => {
        if (willDelete) {
            swal('Aguarde... o registro está sendo processado!', {
                title: 'Pronto!',
                icon: 'success',
                buttons: false
            });

            setTimeout(function() {
                form[0].submit();
            }, 1000);
        } else {
            swal('Mensalidade não estornada!', {
                title: 'Cancelado!',
                icon: 'success',
            });
        }
    });
});
