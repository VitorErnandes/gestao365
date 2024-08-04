@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Clientes')

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

                </tbody>
            </table>
        </div>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/customers/customer.js')) }}"></script>
<script src="{{ asset(mix('assets/js/mainDatatable.js')) }}"></script>
