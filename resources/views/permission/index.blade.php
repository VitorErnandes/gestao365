@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Permissões')

@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="mainTable">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Permissões</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permissions)
                        <tr>
                            <td class="text-center">{{ $permissions->id }}</td>
                            <td>{{ $permissions->name }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="permissions/{{ $permissions->id }}/edit"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Editar</a>
                                        <button class="dropdown-item" onclick="deactivatePermission(this)"
                                            value="{{ $permissions->id }}"><i class="bx bx-trash me-1"></i>
                                            Excluir</button>
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

<script src="{{ asset(mix('assets/js/permissions/permission.js')) }}"></script>
<script src="{{ asset(mix('assets/js/mainDatatable.js')) }}"></script>
