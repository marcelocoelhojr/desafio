@extends('layout')
@section('content')
@include('components.candidates.editModal')
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">COD</th>
                <th scope="col">NOME</th>
                <th scope="col">CPF</th>
                <th scope="col">E-MAIL</th>
                <th scope="col">TELEFONE</th>
                <th scope="col">-</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['data'] as $candidate)
            <tr>
                <th scope="row">{{ $candidate['id'] }}</th>
                <td>{{ $candidate['first_name'] }} {{ $candidate['last_name'] }}</td>
                <td>{{ $candidate['cpf'] }}</td>
                <td>{{ $candidate['email'] }}</td>
                <td>{{ $candidate['phone'] }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal">editar</button>
                    <button class="btn btn-danger btn-sm">excluir</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4 d-flex justify-content-end">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="{{ $data['prev_page_url'] }}"
                    tabindex="-1" aria-disabled="true">Previous</a>
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
@endsection
