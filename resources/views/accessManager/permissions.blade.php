@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Gerenciador de permissões')

@section('content')
    <div class="card">
        <div class="table-responsive">
            <h1>Permissões</h1>
            <ul>
                @foreach ($permissions as $permission)
                    <li>{{ $permission->name }}</li>
                @endforeach
            </ul>

            <h1>Usuários</h1>
            <ul>
                @foreach ($users as $user)
                    <li>{{ $user->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/users/user.js')) }}"></script>
<script src="{{ asset(mix('assets/js/mainDatatable.js')) }}"></script>
