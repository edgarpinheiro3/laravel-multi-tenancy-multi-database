<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth'], 
], function ($router) {
    $router->get('/', [App\Http\Controllers\Tenant\TenantController::class, 'index'])->name('tenant.index');
    $router->get('/companies', [App\Http\Controllers\Tenant\CompanyController::class, 'index'])->name('company.index');
    $router->get('/company/create', [App\Http\Controllers\Tenant\CompanyController::class, 'create'])->name('company.create');
    $router->post('/company/store', [App\Http\Controllers\Tenant\CompanyController::class, 'store'])->name('company.store');
    $router->get('/company/edit/{domain}', [App\Http\Controllers\Tenant\CompanyController::class, 'edit'])->name('company.edit');
    $router->post('/company/edit/{id}', [App\Http\Controllers\Tenant\CompanyController::class, 'update'])->name('company.update');
    $router->get('/company/delete/{id}', [App\Http\Controllers\Tenant\CompanyController::class, 'destroy'])->name('company.destroy');
    $router->post('/company/search', [App\Http\Controllers\Tenant\CompanyController::class, 'search'])->name('company.search');
});

/*
Route::get('/', function () {
    return 'Tenant';
});
*/

