const _token = $('#_token').val();
    
const abrirModal = () => {
    $('#staticBackdrop').modal('show')
    
}
const apagarFuncionario = (id_funcionario) => {
    $.ajax({
        type: "delete",
        url: `/funcionarios/delete/${id_funcionario}`,
        data: {
            _token
        },
        success: function (response) {
            $(`.tr-funcionario-${id_funcionario}`).remove();
            iziToast.success({
                title: 'OK',
                message: response.msg 
            });
            $('#staticBackdrop').modal('hide')
        },
        error: function (response) {
            iziToast.warning({
                title: 'Opa',
                message: response.responseJSON.msg,
            });
        }
    });
}