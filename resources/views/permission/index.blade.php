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
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/users/user.js')) }}"></script>
<script src="{{ asset(mix('assets/js/mainDatatable.js')) }}"></script>
