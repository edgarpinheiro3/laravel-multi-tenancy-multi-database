<?php

namespace App\Tenant\Database;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class DatabaseManager
{

    public function createDatabase(Company $company)
    {
        DB::statement("CREATE SCHEMA `{$company->db_database}` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci");
    }

}