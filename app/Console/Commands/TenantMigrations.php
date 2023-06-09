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

    //--refresh é um parâmetro OPCIONAL {--} a interrogação também é opcional ?
    protected $signature = 'tenants:migrations {id?} {--refresh}';

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
        
        if ($id = $this->argument('id')) {

            $company = Company::find($id);

                if($company)
                    $this->execCommand($company);

            return;
            
        }
        
        $companies = Company::all();

        foreach ($companies as $company) {

            $this->execCommand($company);

        }

    }

    public function execCommand(Company $company)
    {
        $command = $this->option('refresh') ? 'migrate:refresh' : 'migrate';

        $this->tenant->setConnection($company);

        $this->info("Connecting Company {$company->name}");

        $run = Artisan::call($command, [
            '--force' => true,
            '--path' => '/database/migrations/tenant',
        ]);

        if ( $run === 0 ) {
            Artisan::call('db:seed', [
                '--class' => 'TenantsUsersTableSeeder',
            ]);

            $this->info("Migration Success {$company->name}");
        }

        $this->info("End Connecting Company {$company->name}");

        $this->info("------------------------------------------");

    }

}
