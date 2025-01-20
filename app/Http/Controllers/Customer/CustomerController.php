<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
  public function index()
  {
    $customers = Customer::get();

    return view('customers.index', compact('customers'));
  }

  public function create()
  {
    return view('customers.create');
  }

  public function store(Request $request)
  {
    try {
      // Validações de cliente físico
      $physicalCustomerRules = [
        'name' => 'required|string|min:5',
        'birthdayDate' => 'required|date',
        'gender' => 'required|in:0,1',
        'cpf' => 'required|string|min:11|max:14|unique:customers,cpf',
        'rg' => 'required|string|min:5',
        'maritalStatus' => 'required|in:0,1,2',
      ];

      // Validações de cliente jurídico
      $legalCustomerRules = [
        'name' => 'required|string|min:5',
        'fantasyName' => 'required|string|min:5',
        'companyFounding' => 'required|date',
        'cnpj' => 'required|string|size:14|unique:customers,cnpj',
        'ie' => 'required|string|min:9',
      ];

      // Validações comuns
      $commonRules = [
        'cep' => 'required|string|size:8',
        'address' => 'required|string|min:5',
        'numberAddress' => 'required|string',
        'neighborhood' => 'required|string|min:3',
        'city' => 'required|string|min:3',
        'uf' => 'required|string|size:2',
        'observation' => 'nullable|string',
      ];

      // Combinar regras de validação de acordo com o tipo de cliente
      $rules = $commonRules;
      if ($request->customerType == 1) {
        $rules = array_merge($rules, $physicalCustomerRules);
      } elseif ($request->customerType == 2) {
        $rules = array_merge($rules, $legalCustomerRules);
      }

      // Valida os dados
      $validatedData = $request->validate($rules);

      // Cria o cliente
      $customer = new Customer();
      $customer->customer_type = $request->customerType;
      $customer->name = $request->name;
      $customer->birthday_date = $request->customerType == 1 ? $request->birthdayDate : null;
      $customer->gender = $request->customerType == 1 ? $request->gender : null;
      $customer->cpf = $request->customerType == 1 ? $request->cpf : null;
      $customer->rg = $request->customerType == 1 ? $request->rg : null;
      $customer->marital_status = $request->customerType == 1 ? $request->maritalStatus : null;
      $customer->fantasy_name = $request->customerType == 2 ? $request->fantasyName : null;
      $customer->company_founding = $request->customerType == 2 ? $request->companyFounding : null;
      $customer->cnpj = $request->customerType == 2 ? $request->cnpj : null;
      $customer->ie = $request->customerType == 2 ? $request->ie : null;
      $customer->cep = $request->cep;
      $customer->address = $request->address;
      $customer->number_address = $request->numberAddress;
      $customer->neighborhood = $request->neighborhood;
      $customer->city = $request->city;
      $customer->uf = $request->uf;
      $customer->observation = $request->observation;

      // Salva no banco de dados
      $customer->save();

      // Redireciona com mensagem de sucesso
      return redirect()
        ->route('customers.index')
        ->with('success', 'Cliente cadastrado com sucesso!');
    } catch (\Illuminate\Validation\ValidationException $e) {
      // Retorna erros de validação
      return redirect()
        ->back()
        ->withErrors($e->validator)
        ->withInput();
    } catch (\Exception $e) {
      return redirect()
        ->back()
        ->with('error', 'Ocorreu um erro ao salvar o cliente. Tente novamente mais tarde. ' . $e->getMessage())
        ->withInput();
    }
  }

  public function edit($id)
  {
    $customer = Customer::find($id);

    return view('customers.edit', compact('customer'));
  }

  public function update(Request $request, $id)
  {
    try {
      $physicalCustomerRules = [
        'name' => 'required|string|min:5',
        'birthdayDate' => 'required|date',
        'gender' => 'required|in:0,1',
        'cpf' => 'required|string|min:11|max:14|unique:customers,cpf,' . $id,
        'rg' => 'required|string|min:5',
        'maritalStatus' => 'required|in:0,1,2',
      ];

      $legalCustomerRules = [
        'name' => 'required|string|min:5',
        'fantasyName' => 'required|string|min:5',
        'companyFounding' => 'required|date',
        'cnpj' => 'required|string|size:14|unique:customers,cnpj,' . $id,
        'ie' => 'required|string|min:9',
      ];

      $commonRules = [
        'cep' => 'required|string|size:8',
        'address' => 'required|string|min:5',
        'numberAddress' => 'required|string',
        'neighborhood' => 'required|string|min:3',
        'city' => 'required|string|min:3',
        'uf' => 'required|string|size:2',
        'observation' => 'nullable|string',
      ];

      $rules = $commonRules;
      if ($request->customerType == 1) {
        $rules = array_merge($rules, $physicalCustomerRules);
      } elseif ($request->customerType == 2) {
        $rules = array_merge($rules, $legalCustomerRules);
      }

      $request->validate($rules);

      $customer = Customer::findOrFail($id);

      $customer->customer_type = $request->customerType;
      $customer->name = $request->name;
      $customer->birthday_date = $request->customerType == 1 ? $request->birthdayDate : null;
      $customer->gender = $request->customerType == 1 ? $request->gender : null;
      $customer->cpf = $request->customerType == 1 ? $request->cpf : null;
      $customer->rg = $request->customerType == 1 ? $request->rg : null;
      $customer->marital_status = $request->customerType == 1 ? $request->maritalStatus : null;
      $customer->fantasy_name = $request->customerType == 2 ? $request->fantasyName : null;
      $customer->company_founding = $request->customerType == 2 ? $request->companyFounding : null;
      $customer->cnpj = $request->customerType == 2 ? $request->cnpj : null;
      $customer->ie = $request->customerType == 2 ? $request->ie : null;
      $customer->cep = $request->cep;
      $customer->address = $request->address;
      $customer->number_address = $request->numberAddress;
      $customer->neighborhood = $request->neighborhood;
      $customer->city = $request->city;
      $customer->uf = $request->uf;
      $customer->observation = $request->observation;

      $customer->save();

      return redirect()
        ->route('customers.index')
        ->with('success', 'Cliente atualizado com sucesso!');
    } catch (\Illuminate\Validation\ValidationException $e) {
      return redirect()
        ->back()
        ->withErrors($e->validator)
        ->withInput();
    } catch (\Exception $e) {
      return redirect()
        ->back()
        ->with('error', 'Ocorreu um erro ao atualizar o cliente. Tente novamente mais tarde. ' . $e->getMessage())
        ->withInput();
    }
  }

  public function destroy(Customer $customer)
  {
    try {
      $customer->delete();

      Session::flash('success', 'Cliente excluído com sucesso.');

      return true;
    } catch (\Exception $e) {
      Session::flash('error', 'Erro ao excluir cliente. ' . $e->getMessage());

      return false;
    }
  }
}
