@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Edição de grupo de produtos')

@section('content')
    <div class="card p-3">

        <div class="alert alert-info alert-dismissible text-dark" role="alert">
            <h4 class="alert-heading d-flex align-items-center mb-1">Atenção!</h4>
            <p class="mb-0">Informe um nome com mais de 4 caracteres, uma descrição com pelo menos 10 caracteres.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        <form action="{{ url('products-group/' . $productsGroup->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-2 col-sm-12">
                    <label for="id">ID Grupo</label>
                    <input type="number" name="id" id="id" class="form-control"
                        value="{{ $productsGroup->id }}" disabled>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $productsGroup->name }}" required>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="1" {{ $productsGroup->status == 1 ? 'selected' : '' }}>Ativo</option>
                        <option value="0" {{ $productsGroup->status == 0 ? 'selected' : '' }}>Inativo</option>
                    </select>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" name="description">{{ $productsGroup->description }}</textarea>
                </div>
                <div class="mt-4">
                    <button type="submit" id="submitButton" class="btn btn-primary" disabled>Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/globals/validation.js')) }}"></script>
<script src="{{ asset('assets/js/products-group/createProductsGroup.js') }}"></script>
