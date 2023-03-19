$(function() {
    $('#salary').mask('###0.00', {
        reverse: true
    });
    $('#cep').mask('00000-000', {
        reverse: true
    });
})

$(document).on('click', '#saveRegister', function() {
    $.ajax({
        url: 'api/job/create',
        method: 'POST',
        dataType: 'json',
        data: {
            title: document.getElementById('title').value,
            modality: document.getElementById('modality').value,
            type: document.getElementById('type').value,
            salary: document.getElementById('salary').value,
            description: document.getElementById('description').value,
            cep: document.getElementById('cep').value,
            neighborhood: document.getElementById('neighborhood').value,
            street: document.getElementById('street').value,
            state: document.getElementById('state').value,
            city: document.getElementById('city').value,
            number: document.getElementById('number').value,
            complement: document.getElementById('complement').value
        },
        success: function(data) {
            document.getElementById('title').value = ''
            document.getElementById('salary').value = ''
            document.getElementById('description').value = ''
            document.getElementById('cep').value = ''
            document.getElementById('neighborhood').value = ''
            document.getElementById('street').value = ''
            document.getElementById('state').value = ''
            document.getElementById('city').value = ''
            document.getElementById('number').value = ''
            document.getElementById('complement').value = ''
            $("#successAlert").show().hide(8000);
        },
        error: function (request, status, error) {
            $("#errorAlert").show().hide(8000);
        }
    });
});

$(document).on('blur', '#cep', function() {
    var cep = $(this).val();
    cep = cep.replace(/[^a-z0-9]/gi, "");
    $.ajax({
        url: 'https://viacep.com.br/ws/' + cep + '/json/',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
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