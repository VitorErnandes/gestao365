@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Edição de permissão')

@section('content')
    <div class="card p-3">
        <form method="POST" action="{{ url('permissions/' . $permission->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-2 col-sm-12">
                    <label for="id">ID Permissão</label>
                    <input type="number" name="id" id="id" class="form-control" value="{{ $permission->id }}"
                        disabled>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label for="name">Nome da Permissão</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}"
                        placeholder="Cadastrar usuários" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning" id="submitButton" disabled>Alterar Usuário</button>
                </div>
            </div>
        </form>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/permissions/editPermissions.js')) }}"></script>
