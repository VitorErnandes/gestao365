@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Edição de senha do usuário')

@section('content')
    <div class="card p-3">
        <div class="alert alert-info alert-dismissible text-dark" role="alert">
            <h4 class="alert-heading d-flex align-items-center mb-1">Atenção!</h4>
            <p class="mb-0">Informe uma senha com pelo menos 6 caracteres.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        <form method="POST" action="{{ route('users.updatePassword', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}"
                        disabled placeholder="Vitor Ernandes" required>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control"
                        placeholder="vitor.ernandes@email.com" value="{{ $user->email }}" disabled required>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label for="confirmPassword">Confirmar senha</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary" id="submitButton" disabled>Alterar Usuário</button>
                </div>
            </div>
        </form>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/globals/validation.js')) }}"></script>
<script src="{{ asset(mix('assets/js/users/editPassword.js')) }}"></script>
