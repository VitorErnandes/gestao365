@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Permissões de regra')

@section('content')
    <div class="card p-3">
        <form method="POST" action="{{ url('roles/' . $role->id . '/give-permissions') }}">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <div class="col-lg-4 col-sm-12">
                    <label for="regra">Regra</label>
                    <input type="text" name="regra" id="regra" class="form-control" value="{{ $role->name }}"
                        disabled>
                </div>
            </div>
            <div class="row">
                @foreach ($permissions as $permission)
                    <div class="col-lg-3 col-sm-12">
                        <input type="checkbox" name="permission[]" id="permission" value="{{ $permission->name }}"
                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                        {{ $permission->name }}
                    </div>
                @endforeach

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary" id="submitButton">Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
