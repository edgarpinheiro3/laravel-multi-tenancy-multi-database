<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant\DatabaseCreated;
use App\Tenant\Database\DatabaseManager;
use App\Events\Tenant\CompanyCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCompanyDatabase
{

    private $database;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(DatabaseManager $database)
    {
        $this->database = $database;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Tenant\CompanyCreated  $event
     * @return void
     */
    public function handle(CompanyCreated $event)
    {
        $company = $event->company();
        
        if (!$this->database->createDatabase($company)) {
            throw new \Exception('Error Create Database');
        }

        //run migrations
        event (new DatabaseCreated($company));


    }
}
