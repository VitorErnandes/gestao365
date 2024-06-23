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
            <p class="mb-0">Informe um nome com mais de 4 caracteres, uma descrição com pelo menos 10 caracteres.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        <form action="{{ route('products-group.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <label for="brand" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="brand" name="brand" required>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="ean" class="form-label">Código de barras</label>
                    <input type="number" class="form-control" id="ean" name="ean" required>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="measurement_unit" class="form-label">Código de barras</label>
                    <select class="form-control" id="measurement_unit" name="measurement_unit" required>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="ean" class="form-label">Preço de compra</label>
                    <input type="text" class="form-control" id="purchase_price" name="purchase_price" required>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="sale_price" class="form-label">Preço de venda</label>
                    <input type="text" class="form-control" id="sale_price" name="sale_price" required>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="stock_quantity" class="form-label">Quantidade de estoque</label>
                    <input type="text" class="form-control" id="stock_quantity" name="stock_quantity" required>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="minimum_stock" class="form-label">Estoque minimo</label>
                    <input type="text" class="form-control" id="minimum_stock" name="minimum_stock" required>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <label for="image" class="form-label">Imagem</label>
                    <input type="file" name="image" id="image" class="form-control" required>
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
                <div class="col-lg-12 col-sm-12">
                    <label for="observation" class="form-label">Observação</label>
                    <textarea class="form-control" id="observation" name="observation"></textarea>
                </div>
                <div class="mt-4">
                    <button type="submit" id="submitButton" class="btn btn-primary" disabled>Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/globals/validation.js')) }}"></script>
<script src="{{ asset(mix('assets/js/products-group/createProductsGroup.js')) }}"></script>
