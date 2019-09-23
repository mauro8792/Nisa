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



Route::resource('employees', 'EmployeeController')->middleware(['auth']);
Route::resource('expenses', 'ExpenseController')->middleware(['auth']);
Route::resource('categories', 'CategoryController')->middleware(['auth']);
Route::resource('accounts', 'AccountController')->middleware(['auth']);
Route::resource('currentaccounts', 'CurrentAccountController')->middleware(['auth']);

Route::resource('payments', 'PaymentController');
Route::prefix('/pagos')->name('payments.')->middleware(['auth'])->group(function(){
    Route::get('/', 'PaymentController@index')->name('index');
    Route::get('/nuevo', 'PaymentController@create')->name('create');
    Route::delete('/delete/{id}','PaymentController@destroy')->name('destroy');
    Route::get('/newPayment/{id}','PaymentController@newPayment')->name('newPayment'); 
    Route::get('/employee','PaymentController@searchSale')->name('searchSale');      
});

Route::resource('sales', 'SaleController');

Route::prefix('/ventas')->name('sales.')->middleware(['auth'])->group(function(){
    Route::get('/', 'SaleController@index')->name('index');
    Route::get('/nueva','SaleController@create')->name('create');
    Route::get('/ventas/{id}/edit', 'SaleController@edit')->name('edit');
    Route::delete('/detele/{id}','SaleController@destroy')->name('destroy');
    Route::get('/forOrder/{numberOfOrden}','SaleController@forOrder')->name('forOrder');
});

Route::resource('summaries', 'SummaryController');
Route::prefix('/resumen')->name('summary.')->middleware(['auth'])->group(function(){
    Route::get('/','SummaryController@index')->name('index');
    Route::post('/searchForDate', 'SummaryController@searchForDate')->name('searchForDate');
    Route::post('/searchForMonth', 'SummaryController@searchForMonth')->name('searchForMonth');
});

Route::resource('expenses', 'ExpenseController');
Route::prefix('/gastos')->name('expenses.')->middleware(['auth'])->group(function(){
    Route::get('/','ExpenseController@index')->name('index');
    Route::get('/nuevo','ExpenseController@create')->name('create');
    Route::get('/gastos/{id}/edit','ExpenseController@edit')->name('edit');
    Route::post('/searchForCategory','ExpenseController@searchForCategory')->name('searchForCategory');
    Route::post('/searchForDate', 'ExpenseController@searchForDate')->name('searchForDate');

});

Route::get('error', function(){ 
    abort(500);
});

//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
