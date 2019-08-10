<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('clients', 'ClientController');
Route::resource('sales', 'SaleController');

Route::resource('employees', 'EmployeeController');
Route::resource('expenses', 'ExpenseController');
Route::resource('categories', 'CategoryController');
Route::resource('accounts', 'AccountController');
Route::resource('currentaccounts', 'CurrentAccountController');

Route::resource('payments', 'PaymentController');
Route::prefix('/pagos')->name('payments.')->group(function(){
    Route::get('/', 'PaymentController@index')->name('index');
    Route::get('/nuevo', 'PaymentController@create')->name('create');
    Route::delete('/delete/{id}','PaymentController@destroy')->name('destroy');
    Route::get('/newPayment/{id}','PaymentController@newPayment')->name('newPayment'); 
    Route::get('/employee','PaymentController@searchSale')->name('searchSale');      
});
