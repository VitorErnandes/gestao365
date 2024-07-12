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
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value={{ $product->name }}
                        required>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <label for="brand" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="brand" name="brand" value={{ $product->brand }}
                        required>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="ean" class="form-label">Código de barras</label>
                    <input type="number" class="form-control" id="ean" name="ean" value={{ $product->ean }}
                        required>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="products_group" class="form-label">Grupo de produtos</label>
                    <select class="form-control" id="products_group" name="products_group" required>
                        @foreach ($productsGroupList as $group)
                            <option value="{{ $group->id }}"
                                {{ $product->products_group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="ean" class="form-label">Preço de compra</label>
                    <input type="text" class="form-control money" id="purchase_price" name="purchase_price"
                        value={{ number_format($product->purchase_price, 2, ',', '.') }} required>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="sale_price" class="form-label">Preço de venda</label>
                    <input type="text" class="form-control money" id="sale_price" name="sale_price"
                        value={{ number_format($product->sale_price, 2, ',', '.') }} required>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="measurement_unit" class="form-label">Unidade de medida</label>
                    <select class="form-control" id="measurement_unit" name="measurement_unit" required>
                        @foreach ($unitList as $unit)
                            <option value="{{ $unit->id }}"
                                {{ $product->measurement_unit_id == $unit->id ? 'selected' : '' }}>
                                {{ $unit->description }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="stock_quantity" class="form-label">Quantidade de estoque</label>
                    <input type="text" class="form-control" id="stock_quantity" name="stock_quantity"
                        value={{ $product->stock_quantity }} required>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="minimum_stock" class="form-label">Estoque minimo</label>
                    <input type="text" class="form-control" id="minimum_stock" name="minimum_stock"
                        value={{ $product->minimum_stock }} required>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Ativo</option>
                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inativo</option>
                    </select>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <label for="image" class="form-label">Imagem</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col-lg-12 col-sm-12">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <label for="observation" class="form-label">Observação</label>
                    <textarea class="form-control" id="observation" name="observation">{{ $product->observation }}</textarea>
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
