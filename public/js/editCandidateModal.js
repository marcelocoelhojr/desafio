$(document).on('blur', '#cep', function () {
    var cep = $(this).val();
    cep = cep.replace(/[^a-z0-9]/gi, "");
    $.ajax({
        url: 'https://viacep.com.br/ws/' + cep + '/json/',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data.erro) {
                alert('Endereço não encontrado');
            }
            $('#city').val(data.localidade),
            $('#state').val(data.uf),
            $('#street').val(data.logradouro),
            $('#neighborhood').val(data.bairro)
            $('#complement').val(data.complemento)
        }
    });
});

$(function () {
    $('#cep').mask('00000-000', {
        reverse: true
    });
    $('#phone').mask("(99) 9999-99999")
    .focusout(function (event) {  
        var target, phone, element;  
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
        phone = target.value.replace(/\D/g, '');
        element = $(target);  
        element.unmask();  
        if(phone.length > 10) {  
            element.mask("(99) 99999-9999");  
        } else {  
            element.mask("(99) 9999-99999");  
        }  
    });
})