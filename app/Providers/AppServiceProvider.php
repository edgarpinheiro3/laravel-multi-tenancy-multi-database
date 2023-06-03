<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        /**
         * Diretivas
         */

         Blade::if('tenant', function() {

            //Se não é igual ao domínio principal retorna false
            return request()->getHost() != config('tenant.domain_main');

         });

         Blade::if('tenantmain', function() {

            //Se é igual ao domínio principal retorna true
            return request()->getHost() == config('tenant.domain_main');

         });

    }
}
