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
                        <th>Data Nasc / Fund</th>
                        <th>Endereço</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($customers as $customer)
                        <tr>
                            <td></td>
                            <td class="text-center">{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td class="text-center">{{ $customer->birthday_date ?? $customer->company_founding }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->city }}</td>
                            <td>{{ $customer->uf }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        @can('Alterar grupo produtos')
                                            <a class="dropdown-item" href="customers/{{ $customer->id }}/edit"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Editar</a>
                                        @endcan
                                        @can('Excluir grupo produtos')
                                            <button class="dropdown-item" onclick="deactivateCustomer(this)"
                                                value="{{ $customer->id }}"><i class="bx bx-trash me-1"></i>
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

<script src="{{ asset(mix('assets/js/customers/customer.js')) }}"></script>
<script src="{{ asset(mix('assets/js/mainDatatable.js')) }}"></script>
