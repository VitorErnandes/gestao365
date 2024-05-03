@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Gerenciador de permissões')

@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="mainTable">
                <thead>
                    <tr>
                        <th>Nome do Usuário</th>
                        <th>Email</th>
                        <th>Permissões</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="users/{{ $user->id }}/edit"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Editar</a>
                                        <a class="dropdown-item" href="users/{{ $user->id }}/editPassword"><i
                                                class="bx bx-lock-alt me-1"></i>
                                            Alterar senha</a>
                                        <button class="dropdown-item" onclick="deactivateUser(this)"
                                            value="{{ $user->id }}"><i class="bx bx-trash me-1"></i>
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

<script src="{{ asset(mix('assets/js/users/user.js')) }}"></script>
<script src="{{ asset(mix('assets/js/mainDatatable.js')) }}"></script>
