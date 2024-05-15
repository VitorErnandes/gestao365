@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Cadastro de regras')

@section('content')
    <div class="card p-3">
        <form method="POST" action="{{ url('roles') }}">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="name">Nome da regra</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Cadastrar usuários"
                        required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary" id="submitButton" disabled>Criar Regra</button>
                </div>
            </div>
        </form>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/roles/createRoles.js')) }}"></script>
