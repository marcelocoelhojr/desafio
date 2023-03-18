@include('components.addressInputs')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script>
$(function() {
    $('#salary').mask('#.##0,00', {
        reverse: true
    });
    $('#cep').mask('00000-000', {
        reverse: true
    });
})

$(document).on('blur', '#cep', function () {
    var cep = $(this).val();
    cep = cep.replace(/[^a-z0-9]/gi, "");
    $.ajax({
        url: 'https://viacep.com.br/ws/'+cep+'/json/',
        method: 'GET',
        dataType: 'json',
        success: function(data){
            if (data.erro) {
                alert('Endereço não encontrado');
            }
            $('#city').val(data.localidade),
            $('#uf').val(data.uf),
            $('#street').val(data.logradouro),
            $('#neighborhood').val(data.bairro)
            $('#complement').val(data.complemento)
        }
    });
});
</script>
<style>
.separator {
  display: flex;
  align-items: center;
  text-align: center;
}
.separator::before,
.separator::after {
  content: '';
  flex: 1;
  border-bottom: 3px solid #808080;
}
.separator::before {
  margin-right: .25em;
}
.separator::after {
  margin-left: .25em;
}
</style>
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Cadastrar vaga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="separator h4 text text-secondary">Vaga</div>
                    <div class="row col-12 mt-3">
                        <div class="col-12">
                            <label for="" class="form-label">Título<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" require>
                        </div>
                    </div>
                    <div class="row col-12 mt-2">
                        <div class="row col-6 d-flex flex-wrap">
                            <div class="col-md-4 col-sm-6">
                                <label for="" class="form-label">Modalidade<span class="text text-danger">*</span></label>
                                <select class="form-select" aria-label="Default select example" name="modality" require>
                                    <option value="Freelancer">Freelancer</option>
                                    <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                                    <option value="CLT">CLT</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="" class="form-label">Tipo<span class="text text-danger">*</span></label>
                                <select class="form-select" aria-label="Default select example" name="type" require>
                                    <option value="Presencial">Presencial</option>
                                    <option value="Remoto">Remoto</option>
                                    <option value="Remoto">Híbrido</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="" class="form-label">Remuneração</label>
                                <input type="text" class="form-control" name="salary" id="salary">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="formFile" class="form-label">Imagem</label>
                            <input class="form-control form-control-sm" type="file" id="formFile" disabled>
                        </div>
                    </div>
                    <div class="mb-3 mt-2">
                        <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                            rows="3"></textarea>
                    </div>
                    @yield('address')
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>