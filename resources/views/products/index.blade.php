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
                        <th>Email</th>
                        <th>Criado em</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($products as $product)
                        <tr>
                            <td></td>
                            <td class="text-center">{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->created_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/products/products.js')) }}"></script>
<script src="{{ asset(mix('assets/js/mainDatatable.js')) }}"></script>
