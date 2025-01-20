@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Edição de grupo de produtos')

@section('content')
    <div class="card p-3">

        <div class="alert alert-info alert-dismissible text-dark" role="alert">
            <h4 class="alert-heading d-flex align-items-center mb-1">Atenção!</h4>
            <p class="mb-0">Informe um nome com mais de 4 caracteres, uma descrição com pelo menos 10 caracteres.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-3 col-sm-12">
                    <label for="customerType">Tipo de cliente</label>
                    <select class="form-select" id="customerType" name="customerType" required>
                        <option value="1" selected>Físico</option>
                        <option value="2">Jurídico</option>
                    </select>
                </div>
            </div>

            <div class="row" id="physicalCustomer">
                <div class="col-lg-6 col-sm-12 mt-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required value="{{ $customer->name }}">
                </div>
                <div class="col-lg-3 col-sm-12 mt-3">
                    <label for="birthdayDate" class="form-label">Data Nascimento</label>
                    <input type="date" class="form-control" id="birthdayDate" name="birthdayDate" required value="{{ $customer->birthday_date }}">
                </div>
                <div class="col-lg-3 col-sm-12 mt-3">
                    <label for="gender" class="form-label">Genero</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="0" {{ $customer->gender == 0 ? 'selected' : '' }}>Masculino</option>
                        <option value="1" {{ $customer->gender == 1 ? 'selected' : '' }}>Feminino</option>
                    </select>
                </div>
                <div class="col-lg-4 col-sm-12 mt-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required value="{{ $customer->cpf }}">
                </div>
                <div class="col-lg-4 col-sm-12 mt-3">
                    <label for="rg" class="form-label">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" required value="{{ $customer->rg }}">
                </div>
                <div class="col-lg-4 col-sm-12 mt-3">
                    <label for="maritalStatus" class="form-label">Estado civil</label>
                    <select name="maritalStatus" id="maritalStatus" class="form-control">
                        <option value="0" {{ $customer->marital_status == 0 ? 'selected' : '' }}>Casado</option>
                        <option value="1" {{ $customer->marital_status == 1 ? 'selected' : '' }}>Solteiro</option>
                        <option value="2" {{ $customer->marital_status == 2 ? 'selected' : '' }}>Viúvo</option>
                    </select>
                </div>
            </div>

            <div class="row" id="legalCustomer">
                <div class="col-lg-6 col-sm-12 mt-3">
                    <label for="name" class="form-label">Razão social</label>
                    <input type="text" class="form-control" id="name" name="name" required value="{{ $customer->name }}">
                </div>
                <div class="col-lg-6 col-sm-12 mt-3">
                    <label for="fantasyName" class="form-label">Nome Fantasia</label>
                    <input type="text" class="form-control" id="fantasyName" name="fantasyName" required value="{{ $customer->fantasyName }}">
                </div>
                <div class="col-lg-4 col-sm-12 mt-3">
                    <label for="companyFounding" class="form-label">Data fundação</label>
                    <input type="date" class="form-control" id="companyFounding" name="companyFounding" required value="{{ $customer->companyFounding }}">
                </div>
                <div class="col-lg-4 col-sm-12 mt-3">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" required value="{{ $customer->cnpj }}">
                </div>
                <div class="col-lg-4 col-sm-12 mt-3">
                    <label for="ie" class="form-label">IE</label>
                    <input type="text" class="form-control" id="ie" name="ie" required value="{{ $customer->ie }}">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-3 col-sm-12 mt-3">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" required value="{{ $customer->cep }}">
                </div>
                <div class="col-lg-7 col-sm-12 mt-3">
                    <label for="address" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="address" name="address" required value="{{ $customer->address }}">
                </div>
                <div class="col-lg-2 col-sm-12 mt-3">
                    <label for="numberAddress" class="form-label">Número</label>
                    <input type="text" class="form-control" id="numberAddress" name="numberAddress" required value="{{ $customer->number_address }}">
                </div>
                <div class="col-lg-5 col-sm-12 mt-3">
                    <label for="neighborhood" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="neighborhood" name="neighborhood" required value="{{ $customer->neighborhood }}">
                </div>
                <div class="col-lg-5 col-sm-12 mt-3">
                    <label for="city" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="city" name="city" readonly required value="{{ $customer->city }}">
                </div>
                <div class="col-lg-2 col-sm-12 mt-3">
                    <label for="uf" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="uf" name="uf" readonly required value="{{ $customer->uf }}">
                </div>
                <div class="col-lg-12 col-sm-12 mt-3">
                    <label for="observation" class="form-label">Observação</label>
                    <textarea name="observation" id="observation" class="form-control">{{ $customer->observation }}</textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" id="submitButton" class="btn btn-primary" disabled>Salvar</button>
            </div>
        </form>
    </div>
@endsection

<script src="{{ asset(mix('assets/js/globals/validation.js')) }}"></script>
<script src="{{ asset(mix('assets/js/customers/createCustomers.js')) }}"></script>