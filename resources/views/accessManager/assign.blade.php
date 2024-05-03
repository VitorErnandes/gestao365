@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Gerenciador de permissões')

@section('content')
    <div class="card">
        <!-- assign_permission.blade.php -->
        <form action="{{ route('accessManager.assignPermission') }}" method="POST">
            @csrf
            <label for="user_id">Usuário:</label>
            <select name="user_id" id="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <label for="permission_id">Permissão:</label>
            <select name="permission_id" id="permission_id">
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
            </select>
            <button type="submit">Atribuir Permissão</button>
        </form>

    </div>
@endsection

<script src="{{ asset(mix('assets/js/users/user.js')) }}"></script>
<script src="{{ asset(mix('assets/js/mainDatatable.js')) }}"></script>
