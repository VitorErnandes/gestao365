@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Grupo de produtos')

@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="mainTable">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productsGroup as $group)
                        <tr>
                            <td class="text-center">{{ $group->id }}</td>
                            <td>{{ $group->name }}</td>
                            <td>{{ $group->description }}</td>
                            <td class="text-center">{{ $group->status == 1 ? 'Ativo' : 'Inativo' }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        @can('Alterar grupo produtos')
                                            <a class="dropdown-item" href="products-group/{{ $group->id }}/edit"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Editar</a>
                                        @endcan
                                        @can('Excluir grupo produtos')
                                            <button class="dropdown-item" onclick="deactivateProductGroup(this)"
                                                value="{{ $group->id }}"><i class="bx bx-trash me-1"></i>
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

<script src="{{ asset(mix('assets/js/products-group/products-group.js')) }}"></script>
<script src="{{ asset(mix('assets/js/mainDatatable.js')) }}"></script>
