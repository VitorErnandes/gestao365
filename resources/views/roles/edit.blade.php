@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Edição de regras')

@section('content')
    <div class="card p-3">
        <form method="POST" action="{{ url('roles/' . $role->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-2 col-sm-12">
                    <label for="id">ID Regra</label>
                    <input type="number" name="id" id="id" class="form-control" value="{{ $role->id }}"
                        disabled>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label for="name">Nome da Regra</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}"
                        placeholder="Cadastrar usuários" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning" id="submitButton" disabled>Alterar Regra</button>
                </div>
            </div>
        </form>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/roles/editRoles.js')) }}"></script>
