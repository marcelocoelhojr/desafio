
$(function () {
    $('#salaryEdit').mask('###0.00', {
        reverse: true
    });
    $('#cepEdit').mask('00000-000', {
        reverse: true
    });
})

$(document).on('click', '#deleteJob', function () {
    $('#editModal').hide();
});

$(document).on('click', '#confirmDelete', function () {
    let code = document.getElementById('confirmCodeDelete').value;
    let confirmeCode = document.getElementById('confirmCode').innerText;
    if (confirmeCode == code) {
        let id = document.getElementById('confirmDelete').value;
        deleteJob(id);
    }
    location.reload();
});
function deleteJob(id) {
    $.ajax({
        url: 'api/job/' + id,
        method: 'DELETE',
        dataType: 'json',
        success: function (data) {
            location.reload();
        }
    });
}


function edit(id) {
    $.ajax({
        url: 'api/job/' + id,
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            document.getElementById('titleEdit').value = data.data[0].title
            document.getElementById('salaryEdit').value = data.data[0].salary
            document.getElementById('descriptionEdit').value = data.data[0].description
            document.getElementById('modalityEdit').value = data.data[0].modality
            document.getElementById('typeEdit').value = data.data[0].type
            document.getElementById('neighborhoodEdit').value = data.data[0].address.neighborhood
            document.getElementById('stateEdit').value = data.data[0].address.state
            document.getElementById('cityEdit').value = data.data[0].address.city
            document.getElementById('numberEdit').value = data.data[0].address.number
            document.getElementById('cepEdit').value = data.data[0].address.cep
            document.getElementById('streetEdit').value = data.data[0].address.street
            document.getElementById('complementEdit').value = data.data[0].address.complement
            document.getElementById('editJob').value = data.data[0].id
            document.getElementById('addressId').value = data.data[0].address.id
            document.getElementById('confirmDelete').value = data.data[0].id
        }
    });
}

function editJob(id) {
    $.ajax({
        url: 'api/job/update/' + id,
        method: 'PUT',
        dataType: 'json',
        data: {
            title: document.getElementById('titleEdit').value,
            modality: document.getElementById('modalityEdit').value,
            type: document.getElementById('typeEdit').value,
            salary: document.getElementById('salaryEdit').value,
            description: document.getElementById('descriptionEdit').value,
            cep: document.getElementById('cepEdit').value,
            neighborhood: document.getElementById('neighborhoodEdit').value,
            street: document.getElementById('streetEdit').value,
            state: document.getElementById('stateEdit').value,
            city: document.getElementById('cityEdit').value,
            number: document.getElementById('numberEdit').value,
            complement: document.getElementById('complementEdit').value,
            addressId: document.getElementById('addressId').value,
            status: document.getElementById('statusEdit').value
        },
        success: function (data) {
            $("#successAlertEdit").show().hide(8000);
            location.reload();
        },
        error: function (request, status, error) {
            $("#errorAlertEdit").show().hide(8000);
        }
    });
}
