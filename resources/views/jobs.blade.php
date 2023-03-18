@extends('layout')
@extends('components.jobs.registerModal')
@section('content')
<style>
    .card:hover {
        -xpedu-transform: scale(1);
        -ms-transform: scale(1.5);
        transform: scale(1.1);
    }
</style>
<div class="mt-3 d-flex justify-content-center align-items-center flex-column">
    <div class="d-flex flex-column mt-3">
        <div class="container d-flex justify-content-between mb-3 flex-wrap">
            <div class="d-flex col-6">
                <input type="text" class="form-control">
                <button class="ml-1 btn btn-outline-primary">Pesquisar</button>
            </div>
            <div>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#register">+ Cadastrar Vaga</button>
            </div>
        </div>
        @for($i = 0; $i < 4; $i++)
            <div class="card mt-3" style="max-width: 1000px;">
                <div class="row g-0 ">
                    <div class="col-md-4">
                        <img src="https://img.freepik.com/fotos-gratis/pessoas-sorridentes-de-tiro-medio-no-escritorio_23-2149300697.jpg?w=1380&t=st=1679084215~exp=1679084815~hmac=4a4cd4b93a1d61a2b2728ace65f34020ff25a1605e8d12a3ba158f565f2ed007" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-md-8 d-flex flex-column justify-content-between ">
                        <div class="mt-2">
                            <div class="d-flex flex-column container">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">01 - Desenvolvedor web</h5>
                                    <h5 class="text text-success">Em andamento</h5>
                                </div>
                                <h6 class="text text-secondary">
                                    R$ 5600,00 - Freelancer
                                </h6>
                            </div>

                        </div>
                        <div class="container d-flex justify-content-between">
                            <h6 class="card-text ">
                                <small class="text-muted">
                                    <img src="https://cdn-icons-png.flaticon.com/512/83/83909.png" alt="" width="15" height="13">
                                    São Paulo - SP
                                </small>
                            </h6>
                            <h6 class="text text-secondary">Remoto</h6>
                        </div>
                    </div>

                </div>
            </div>
        @endfor
</div>
</div>
@endsection('content')
