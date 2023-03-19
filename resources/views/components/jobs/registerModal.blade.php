@include('components.addressInputs')
@section('registerModal')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<link href="{{ asset('css/registerModal.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/registerModal.js') }}"></script>
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Cadastrar vaga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="errorAlert" role="alert" >
                    Erro ao cadastrar vaga
                </div>
                <div class="alert alert-success" id="successAlert" role="alert" >
                    Vaga cadastrada com sucesso
                </div>
                <div class="separator h4 text text-secondary">Vaga</div>
                <div class="row col-12 mt-3">
                    <div class="col-12">
                        <label for="" class="form-label">Título<span class="text text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" require>
                    </div>
                </div>
                <div class="row col-12 mt-2">
                    <div class="row col-6 d-flex flex-wrap">
                        <div class="col-md-4 col-sm-6">
                            <label for="" class="form-label">Modalidade<span class="text text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example"
                            name="modality" id="modality" require>
                                <option value="Freelancer">Freelancer</option>
                                <option value="PJ">PJ</option>
                                <option value="CLT">CLT</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label for="" class="form-label">Tipo<span class="text text-danger">*</span></label>
                            <select class="form-select" name="type" id="type" require>
                                <option value="Presencial">Presencial</option>
                                <option value="Remoto">Remoto</option>
                                <option value="Hibrido">Hibrido</option>
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
                    <label for="exampleFormControlTextarea1" class="form-label">Descrição
                        <span class="text text-danger">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="3" require></textarea>
                </div>
                @yield('address')
            </div>
            <div class="modal-footer mr-3">
                <button type="button" class="btn btn-success" id="saveRegister">salvar</button>
            </div>
        </div>
    </div>
</div>
@endsection
