<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Events\Tenant\CompanyCreated;

class CompanyController extends Controller
{
    private $company;

    public function __construct(Company $company) 
    {
        $this->company = $company;
    }

    public function store(Request $request)
    {

        $company = $this->company->create([
            'name' => 'Empresa x '.Str::random(5), 
            'domain' => Str::random(5).'minhaempresa.com', 
            'db_database' => 'laravel-multi-'.Str::random(5), 
            'db_hostname' => '172.17.0.3', 
            'db_username' => 'root', 
            'db_password' => 'root'
        ]);

        event(new CompanyCreated($company));

        dd($company);
    }

}
