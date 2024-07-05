@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Produtos')

@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="mainTable">
                <thead>
                    <tr>
                        <th></th>
                        <th class="text-center">ID</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Preço de compra</th>
                        <th>Preço de venda</th>
                        <th>Estoque</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($products as $product)
                        <tr>
                            <td></td>
                            <td class="text-center">{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ number_format($product->purchase_price, 2, ',', '.') }}</td>
                            <td>{{ number_format($product->sale_price, 2, ',', '.') }}</td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        @can('Alterar produto')
                                            <a class="dropdown-item" href="users/{{ $product->id }}/edit"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Editar</a>
                                        @endcan
                                        @can('Excluir produto')
                                            <button class="dropdown-item" onclick="deactivateProduct(this)"
                                                value="{{ $product->id }}"><i class="bx bx-trash me-1"></i>
                                                Excluir</button>
                                        @endcan
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/products/products.js')) }}"></script>
<script src="{{ asset(mix('assets/js/mainDatatable.js')) }}"></script>
