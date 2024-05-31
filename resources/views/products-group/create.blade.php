@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Cadastro de grupo de produtos')

@section('content')
    <div class="card p-3">

        <div class="alert alert-info alert-dismissible text-dark" role="alert">
            <h4 class="alert-heading d-flex align-items-center mb-1">Atenção!</h4>
            <p class="mb-0">Informe um nome com mais de 2 caracteres, um e-mail válido e uma
                senha com pelo menos 6 caracteres.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        <form action="{{ route('products-group.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-10 col-sm-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/globals/validation.js')) }}"></script>
<script src="{{ asset('assets/js/users/createUser.js') }}"></script>
