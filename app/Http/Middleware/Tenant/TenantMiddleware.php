<?php

namespace App\Http\Middleware\Tenant;

use App\Tenant\ManagerTenant;
use App\Models\Company;
use Closure;
use Illuminate\Http\Request;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $manager = app(ManagerTenant::class);

        if($manager->domainIsMain())
        
            return $next($request);
        
        $company = $this->getCompany($request->getHost());
        
        if(!$company && $request->url() != route('404.tenant')) {

            return redirect()->route('404.tenant');

        } else if ( $request->url() != route('404.tenant') && !$manager->domainIsMain() ) {

            $manager->setConnection($company);

            //chama a função que criar a sessão
            $this->setSessionCompany($company->only([
                'name',
                'uuid'
            ]));

        }

        return $next($request);
    }

    public function getCompany($host)
    {
        return Company::where('domain', $host)->first();
    }

    public function setSessionCompany($company) {

        session()->put('company', $company);

    }

}
