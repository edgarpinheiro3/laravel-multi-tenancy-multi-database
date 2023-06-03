<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Requests\Tennant\StoreUpdateCompanyFormRquest;
use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Events\Tenant\CompanyCreated;
use App\Events\Tenant\DatabaseCreated;

class CompanyController extends Controller
{
    private $company;

    public function __construct(Company $company) 
    {
        $this->company = $company;

        $this->middleware('auth');
    }

    public function index()
    {
        $companies = $this->company->latest()->paginate();

        return view('tenants.companies.index', compact('companies'));
    }

    public function create()
    {
        return view("tenants.companies.create");
    }

    public function store(Request $request)
    {

        $company = $this->company->create($request->all());

        if ($request->has('create_database'))
            event(new CompanyCreated($company));
        else 
            event(new DatabaseCreated($company));
        
        return redirect()
                    ->route('company.index')
                    ->withSuccess('Cadastro Realizado com Sucesso!');

    }

    public function edit($domain)
    {
        $company =  $this->company->where('domain', $domain)->first();

        if(!$company)
            return redirect()->back();
        
        return view('tenants.companies.edit', compact('company'));

    }

    public function update(Request $request, $id)
    {
        if(!$company = $this->company->find($id))
            return redirect()->back()->withInput();

            $company->update($request->all());

            return redirect()
                        ->route('company.index')
                        ->withSuccess('Empresa Atualizada com Sucesso!');

    }

    public function destroy($id)
    {
        if(!$company = $this->company->find($id))
            return redirect()->back();
        
        $company->delete();

        return redirect()
                ->route('company.index')
                ->withSuccess('Empresa Atualizada com Sucesso!');

    }

    public function search(Request $request)
    {
        $palavraPesquisa = $request->get('pesquisar');

        $companies = $this->company->where('name', 'LIKE', "%$palavraPesquisa%")->get();

        return view('tenants.companies.index', compact('companies'));
    }


}
