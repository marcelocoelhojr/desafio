@extends('layout')
@include('components.jobs.registerModal')
@include('components.filters')
@section('content')
@yield('registerModal')
<link href="{{ asset('css/job.css') }}" rel="stylesheet">
<div class="mt-3 d-flex justify-content-center flex-column">
    <div class="d-flex flex-column mt-3">
        <div class="container d-flex justify-content-between mb-3 flex-wrap">
            <div class="d-flex col-6">
                <input type="text" class="form-control">
                <button class="ml-1 btn btn-dark">Pesquisar</button>
                <div class="">
                    <button class="ml-2 btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">Filtros</button>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#register">+ Cadastrar Vaga</button>
            </div>
        </div>
        @yield('filters')
        @foreach($data['data'] as $job)
            <div class="card mt-3">
                <div class="row g-0 ">
                    <div class="col-md-2">
                        <img style="max-height: 150px;" class="card-img" id="img" src="{{ asset($job['image']) }}" alt="https://img.freepik.com/fotos-gratis/pessoas-sorridentes-de-tiro-medio-no-escritorio_23-2149300697.jpg?w=1380&t=st=1679084215~exp=1679084815~hmac=4a4cd4b93a1d61a2b2728ace65f34020ff25a1605e8d12a3ba158f565f2ed007" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-md-10 d-flex flex-column justify-content-between ">
                        <div class="mt-2">
                            <div class="d-flex flex-column container">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">0{{ $job['id'] }} - {{ $job['title'] }}</h5>
                                    <h5 class="text text-success">Em andamento</h5>
                                </div>
                                <h6 class="text text-secondary">
                                    R$ {{ $job['salary'] }} - {{ $job['modality']}}
                                </h6>
                            </div>
                        </div>
                        <div class="container d-flex justify-content-between">
                            <h6 class="card-text ">
                                <small class="text-muted">
                                    <img src="https://cdn-icons-png.flaticon.com/512/83/83909.png" alt="" width="15" height="13">
                                    {{ $job['address']['city'] }} -  {{ $job['address']['state'] }}
                                </small>
                            </h6>
                            <h6 class="text text-secondary">Remoto</h6>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
        <div class="mt-4 d-flex justify-content-end">
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="{{ $data['prev_page_url'] }}" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    @foreach ($data['links'] as $link)
                        @if ($link['label'] != 'Next &raquo;' && $link['label'] != '&laquo; Previous')
                            <li class="page-item">
                                <a class="page-link" href="{{ $link['url'] }}"> {{ $link['label']}}</a>
                            </li>
                        @endif
                    @endforeach
                    <li class="page-item">
                        <a class="page-link" href="{{ $data['next_page_url'] }}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
</div>
</div>
@endsection('content')
