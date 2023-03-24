$(document).on('click', '#save', function () {
    var perPage = document.getElementById('per_page').value;
    $.ajax({
        url: 'api/' + $('#pageIdentifier').val() + '/cache',
        method: 'POST',
        dataType: 'json',
        data: {
            per_page: perPage
        },
        success: function (data) {

        }
    });
    refreshPage();
});

function refreshPage() {
    location.reload(true);
}