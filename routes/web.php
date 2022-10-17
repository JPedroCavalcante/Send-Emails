<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', function() {
    return redirect('/customers');
}
);

Route::get('/customers/cadastro', function (){
    return view('customers.cadastro');
});

Route::resource('/customers', CustomerController::class);

Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);
Route::get('/customers/edit/{id}', [CustomerController::class, 'edit']);
Route::put('/customers/update/{id}', [CustomerController::class, 'update']);

Route::post('customers-send-email', [CustomerController::class, 'sendEmail'])->name('ajax.send.email');

Route::post('/customers/cadastrar', [CustomerController::class, 'create']);

