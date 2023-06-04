<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Tenant\ManagerTenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TennantSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'tenants:seed {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Seeder Tenants';

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

        $this->tenant->setConnection($company);

        $this->info("Connecting Company {$company->name}");

        $command = Artisan::call('db:seed', [
            '--class' => 'TenantsUsersTableSeeder',
        ]);

        if (  $command === 0 ) {
            $this->info("Success {$company->name}");
        }

        $this->info("End Connecting Company {$company->name}");

        $this->info("------------------------------------------");

    }
}
