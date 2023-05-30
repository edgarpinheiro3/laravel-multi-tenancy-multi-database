<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Tenant\ManagerTenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TenantMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    //--refresh é um parâmetro OPCIONAL {--}
    protected $signature = 'tenants:migrations {--refresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Migrations Tenants';

    private $tenant;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ManagerTenant $tenant)
    {
        parent::__construct();

        $this->tenant = $tenant;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $command = $this->option('refresh') ? 'migrate:refresh' : 'migrate' ;
        
        $companies = Company::all();

        foreach ($companies as $company) {

            $this->tenant->setConnection($company);

            $this->info("Connecting Company {$company->name}");

            Artisan::call($command, [
                '--force' => true,
                '--path' => '/database/migrations/tenant',
            ]);

            $this->info("End Connecting Company {$company->name}");

            $this->info("------------------------------------------");

        }

    }
}
