@include('components.addressInputs')
@section('editModal')
<script type="text/javascript" src="{{ asset('js/editModal.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<link href="{{ asset('css/editModal.css') }}" rel="stylesheet">
<div class="modal" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar vaga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="h3 text text-muted">Para excluir confirme o código</h3>
                <div class="d-flex flex-column align-items-center">
                    <h6 class="h1 text text-success" id="confirmCode" value=""> {{ rand(1000,9999) }} </h6>
                    <div class="col-2">
                        <input type="text" class="form-control" id="confirmCodeDelete">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="confirmDelete">Confirmar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Edição</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="errorAlertEdit" role="alert">
                    Erro ao atualizar vaga
                </div>
                <div class="alert alert-success" id="successAlertEdit" role="alert">
                    Vaga atualizada com sucesso
                </div>
                <div class="separator h4 text text-secondary">Vaga</div>
                <div class="row col-12 mt-3">
                    <div class="col-12">
                        <label for="" class="form-label">Título<span class="text text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="titleEdit" require>
                    </div>
                </div>
                <div class="row col-12 mt-2">
                    <div class="row col-6 d-flex flex-wrap">
                        <div class="col-md-4 col-sm-6">
                            <label for="" class="form-label">Modalidade<span class="text text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="modality" id="modalityEdit" require>
                                <option value="Freelancer">Freelancer</option>
                                <option value="PJ">PJ</option>
                                <option value="CLT">CLT</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label for="" class="form-label">Tipo<span class="text text-danger">*</span></label>
                            <select class="form-select" name="type" id="typeEdit" require>
                                <option value="Presencial">Presencial</option>
                                <option value="Remoto">Remoto</option>
                                <option value="Hibrido">Hibrido</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label for="" class="form-label">Remuneração</label>
                            <input type="text" class="form-control" name="salary" id="salaryEdit">
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="formFile" class="form-label">Status</label>
                        <select class="form-select" name="type" id="statusEdit" require>
                            <option value="Em andamento">Em andamento</option>
                            <option value="Pendente">Pendente</option>
                            <option value="Encerrado">Encerrado</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="formFile" class="form-label">Imagem</label>
                        <input class="form-control form-control-sm" type="file" id="formFile" disabled>
                    </div>
                </div>
                <div class="mb-3 mt-2">
                    <label for="exampleFormControlTextarea1" class="form-label">Descrição
                        <span class="text text-danger">*</span></label>
                    <textarea class="form-control" id="descriptionEdit" name="description" rows="3" require></textarea>
                </div>
                <div class="separator h4 text text-secondary mt-2">Localidade</div>
                <input type="hidden" id="addressId">
                <div class="row col-md-12 col-sm-12">
                    <div class="col-md-6 col-sm-6 row">
                        <div class="col-md-4 col-sm-4">
                            <label for="" class="form-label">Cep</label>
                            <input type="text" class="form-control" name="cep" id="cepEdit">
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label for="" class="form-label">Estado<span class="text text-danger">*</span></label>
                            <select name="state" id="stateEdit" class="form-select" aria-placeholder="UF" require>
                                <option>AC</option>
                                <option>AL</option>
                                <option>AP</option>
                                <option>AM</option>
                                <option>BA</option>
                                <option>AP</option>
                                <option>CE</option>
                                <option>DF</option>
                                <option>ES</option>
                                <option>GO</option>
                                <option>MA</option>
                                <option>MT</option>
                                <option>MS</option>
                                <option>MG</option>
                                <option>PA</option>
                                <option>PB</option>
                                <option>PR</option>
                                <option>PE</option>
                                <option>PI</option>
                                <option>RJ</option>
                                <option>RN</option>
                                <option>RS</option>
                                <option>RO</option>
                                <option>RR</option>
                                <option>SC</option>
                                <option>SE</option>
                                <option>TO</option>
                                <option>SP</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label for="" class="form-label">Nº</label>
                            <input type="number" class="form-control" name="number" id="numberEdit">
                        </div>
                    </div>
                    <div class="row col-md-6 col-sm-6">
                        <div class="col-md-6 col-sm-6">
                            <label for="" class="form-label">Cidade<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control" name="city" id="cityEdit" require>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="" class="form-label">Bairro</label>
                            <input type="text" class="form-control" name="neighborhood" id="neighborhoodEdit">
                        </div>
                    </div>
                </div>
                <div class="row col-md-12 col-sm-12 mt-2">
                    <div class="col-md-6 col-sm-6">
                        <label for="" class="form-label">Rua/Avenida</label>
                        <input type="text" class="form-control" name="street" id="streetEdit">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <label for="" class="form-label">Complemento</label>
                        <input type="text" class="form-control" name="complement" id="complementEdit">
                    </div>
                </div>
            </div>
            <div class="modal-footer mr-3">
                <button type="button" class="btn btn-danger" id="deleteJob" data-toggle="modal"
                data-target="#deleteModal">excluir</button>
                <button type="button" class="btn btn-success" id="editJob" onclick="editJob(value)">salvar</button>
            </div>
        </div>
    </div>
</div>
@endsection