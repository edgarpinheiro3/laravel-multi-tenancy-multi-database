<?php

use Illuminate\Support\Facades\Route;

Route::group([
    /*
    'middleware' => ['tenants'],
    'prefix' => 'tenants'
    */
], function ($router) {
    $router->get('/company/store', [App\Http\Controllers\Tenant\CompanyController::class, 'store'])->name('company.store');
});


Route::get('/', function () {
    return 'Tenant';
});
