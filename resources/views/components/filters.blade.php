@section('filters')
<script>
    $(document).on('click', '#save', function() {
        var perPage = document.getElementById('per_page').value;
        $.ajax({
            url: 'api/cache',
            method: 'POST',
            dataType: 'json',
            data: {
                per_page: perPage
            },
            success: function(data) {

            }
        });
        refreshPage();
    });

    function refreshPage() {
        location.reload(true);
    }
</script>
<div class="collapse mt-2" id="collapseExample">
    <div class="card card-body bg-light">
        <div class="col-md-12 col-sm-12 d-flex">
            <div class="card card-body col-md-3 col-sm-3">
                <div class="d-flex col-12">
                    <label for="" class="form-label h6">Nº vagas por página</label>
                    <div class="col-md-4 col-sm-4 ml-2">
                        <input type="number" class="form-control" name="per_page" value="" id="per_page">
                    </div>
                </div>
            </div>
            <div class="card card-body col-md-12 col-sm-12 ml-2">
                <div class="d-flex col-12">
                    <button class="btn btn-success" id="save">salvar</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
