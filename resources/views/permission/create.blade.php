@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Cadastro de permissões')

@section('content')
    <div class="card p-3">
        <form method="POST" action="{{ url('permissions') }}">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="name">Nome da Permissão</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Cadastrar usuários"
                        required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary" id="submitButton" disabled>Criar Usuário</button>
                </div>
            </div>
        </form>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/permissions/createPermissions.js')) }}"></script>
