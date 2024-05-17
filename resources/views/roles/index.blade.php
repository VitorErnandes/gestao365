@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Regras')

@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="mainTable">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Regras</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td class="text-center">{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="roles/{{ $role->id }}/give-permissions"><i
                                                class="bx bx-lock-alt me-1"></i>
                                            Permissões</a>
                                        <a class="dropdown-item" href="roles/{{ $role->id }}/edit"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Editar</a>
                                        <button class="dropdown-item" onclick="deactivateRole(this)"
                                            value="{{ $role->id }}"><i class="bx bx-trash me-1"></i>
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

<script src="{{ asset(mix('assets/js/roles/roles.js')) }}"></script>
<script src="{{ asset(mix('assets/js/mainDatatable.js')) }}"></script>
