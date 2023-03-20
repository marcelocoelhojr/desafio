@include('components.addressInputs')
<script type="text/javascript" src="{{ asset('js/editCandidateModal.js') }}"></script>
<link href="{{ asset('css/editCandidateModal.css') }}" rel="stylesheet">
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
                <form action="/api/candidate/update" method="POST">
                    <h6 class="separator h4 text text-secondary mt-2"">Candidato</h6>
                    <input type="hidden" id="addressId">
                    <div class="row col-md-12 col-sm-12">
                        <div class="row col-md-6 col-sm-6">
                            <div class="col-md-6 col-sm-6">
                                <label for="" class="form-label">Primeiro nome<span class="text text-danger">*</span>
                            </label>
                                <input type="text" class="form-control" name="first_name" id="first_name" require>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label for="" class="form-label">Sobrenome<span class="text text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="last_name" id="last_name" require>
                            </div>
                        </div>
                        <div class="row col-md-6 col-sm-6">
                            <div class="col-md-6 col-sm-6">
                                <label for="" class="form-label">CPF<span class="text text-danger">*</span></label>
                                <input type="text" class="form-control" name="cpf" id="cpf" require>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label for="" class="form-label">Telefone<span class="text text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone" id="phone" require>
                            </div>
                        </div>
                        @yield('address')
                    </div>
                </div>
                <div class="modal-footer mr-3">
                    <button type="button" class="btn btn-danger" id="deleteJob" data-toggle="modal"
                    data-target="#deleteModal">excluir</button>
                    <button type="submit" class="btn btn-success">salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
