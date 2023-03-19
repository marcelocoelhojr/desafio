@section('address')
<div class="separator h4 text text-secondary mt-2">Localidade</div>
<div class="row col-md-12 col-sm-12">
    <div class="col-md-6 col-sm-6 row">
        <div class="col-md-4 col-sm-4">
            <label for="" class="form-label">Cep</label>
            <input type="text" class="form-control" name="cep" id="cep">
        </div>
        <div class="col-md-4 col-sm-4">
            <label for="" class="form-label">Estado<span class="text text-danger">*</span></label>
            <select name="state" id="state" class="form-select" aria-placeholder="UF" require>
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
            <input type="number" class="form-control" name="number" id="number">
        </div>
    </div>
    <div class="row col-md-6 col-sm-6">
        <div class="col-md-6 col-sm-6">
            <label for="" class="form-label">Cidade<span class="text text-danger">*</span></label>
            <input type="text" class="form-control" name="city" id="city" require>
        </div>
        <div class="col-md-6 col-sm-6">
            <label for="" class="form-label">Bairro</label>
            <input type="text" class="form-control" name="neighborhood" id="neighborhood">
        </div>
    </div>
</div>
<div class="row col-md-12 col-sm-12 mt-2">
    <div class="col-md-6 col-sm-6">
        <label for="" class="form-label">Rua/Avenida</label>
        <input type="text" class="form-control" name="street" id="street">
    </div>
    <div class="col-md-6 col-sm-6">
        <label for="" class="form-label">Complemento</label>
        <input type="text" class="form-control" name="complement" id="complement">
    </div>
</div>
@endsection
