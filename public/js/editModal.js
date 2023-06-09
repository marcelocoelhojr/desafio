
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
            console.log(data.data.title);
            document.getElementById('titleEdit').value = data.data.title
            document.getElementById('salaryEdit').value = data.data.salary
            document.getElementById('descriptionEdit').value = data.data.description
            document.getElementById('modalityEdit').value = data.data.modality
            document.getElementById('typeEdit').value = data.data.type
            document.getElementById('stateEdit').value = data.data.address.state
            document.getElementById('cityEdit').value = data.data.address.city
            document.getElementById('numberEdit').value = data.data.address.number
            document.getElementById('cepEdit').value = data.data.address.cep
            document.getElementById('streetEdit').value = data.data.address.street
            document.getElementById('statusEdit').value = data.data.status
            document.getElementById('complementEdit').value = data.data.address.complement
            document.getElementById('neighborhoodEdit').value = data.data.address.neighborhood
            document.getElementById('editJob').value = data.data.id
            document.getElementById('addressId').value = data.data.address.id
            document.getElementById('confirmDelete').value = data.data.id

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
