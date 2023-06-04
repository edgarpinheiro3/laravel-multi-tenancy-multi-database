<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/404-tenant', function () {
    return view('errors.404-tenant');
})->name('404.tenant');


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

// Criação de Rotas Manualmente
/*
Route::get('login', [Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [Auth\LoginController::class, 'login']);
Route::post('logout', [Auth\LoginController::class, 'logout'])->name('logout');
Route::get('sair', [Site\SiteController::class, 'logout'])->name('logout');

Route::post('password/email', [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.link.email');
Route::get('password/reset', [Auth\ResetPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
Route::post('password/reset', [Auth\ResetPasswordController::class, 'reset'])->name('password.reset.go');
Route::get('password/reset/{token}', [Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset.token');

Route::group([
    'middleware' => ['not.domain.main'], 
], function ($router) {
    $router->get('register', [Auth\RegisterController::class, 'showRegistrationForm'])->name('register.show');
    $router->post('register', [Auth\RegisterController::class, 'register'])->name('register.show');

});
*/
Route::resource('posts', PostController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');