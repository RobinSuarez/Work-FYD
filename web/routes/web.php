<?php

use App\Http\Controllers\tb_ar_tr_or_controller;
use App\Http\Controllers\tb_ar_tr_soa_controller;
use App\Http\Controllers\tb_crm_mf_area_controller;
use App\Http\Controllers\tb_crm_mf_bank_controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\tb_crm_mf_client_controller;
use App\Http\Controllers\tb_crm_mf_service_controller;
use App\Http\Controllers\tb_crm_mf_status_controller;
use App\Http\Controllers\tb_crm_mf_tax_type_controller;
use App\Http\Controllers\tb_crm_mf_uom_controller;
use App\Http\Controllers\tb_sales_tr_proposal_controller;
use App\Http\Controllers\tb_sales_tr_proposal_services_controller;
use App\Http\Controllers\tb_crm_mf_company_controller;
use App\Http\Controllers\tb_crm_mf_salesman_controller;
use App\Http\Controllers\tb_sales_tr_contract_controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('users', UserController::class); //x
Route::get('/users/profile-edit-password/{user}', 'App\Http\Controllers\tb_sys_mf_user_controller@profile_edit_password')->name('users.profile-edit-password');
Route::put('/users/profile-update-password/{user}', 'App\Http\Controllers\tb_sys_mf_user_controller@profile_update_password')->name('users.profile-update-password');
Route::put('/users/profile-reset-password/{user}', 'App\Http\Controllers\tb_sys_mf_user_controller@profile_reset_password')->name('users.profile-reset-password');

Route::resource('clients', tb_crm_mf_client_controller::class);
Route::resource('services', tb_crm_mf_service_controller::class);
Route::resource('statuses', tb_crm_mf_status_controller::class);
Route::resource('tax-types', tb_crm_mf_tax_type_controller::class);
Route::resource('uoms', tb_crm_mf_uom_controller::class);
Route::resource('areas', tb_crm_mf_area_controller::class);
Route::resource('companies', tb_crm_mf_company_controller::class);

Route::resource('proposals', tb_sales_tr_proposal_controller::class);
Route::resource('salesmen', tb_crm_mf_salesman_controller::class);
Route::resource('banks', tb_crm_mf_bank_controller::class);

//PROPOSAL SERVICES
Route::get('/proposal-services/create/{id}', 'App\Http\Controllers\tb_sales_tr_proposal_services_controller@create')->name('proposal-services.create');
Route::post('/proposal-services/store/', 'App\Http\Controllers\tb_sales_tr_proposal_services_controller@store')->name('proposal-services.store');
Route::get('/proposal-services/show/{id}', 'App\Http\Controllers\tb_sales_tr_proposal_services_controller@show')->name('proposal-services.show');
Route::get('/proposal-services/edit/{id}', 'App\Http\Controllers\tb_sales_tr_proposal_services_controller@edit')->name('proposal-services.edit');
Route::put('/proposal-services/update/{id}', 'App\Http\Controllers\tb_sales_tr_proposal_services_controller@update')->name('proposal-services.update');
Route::delete('/proposal-services/destroy/{id}', 'App\Http\Controllers\tb_sales_tr_proposal_services_controller@destroy')->name('proposal-services.destroy');

Route::get('/proposal-services-terms/create/{id}', 'App\Http\Controllers\tb_sales_tr_proposal_services_term_controller@create')->name('proposal-services-terms.create');
Route::post('/proposal-services-terms/store/', 'App\Http\Controllers\tb_sales_tr_proposal_services_term_controller@store')->name('proposal-services-terms.store');
Route::get('/proposal-services-terms/show/{id}', 'App\Http\Controllers\tb_sales_tr_proposal_services_term_controller@show')->name('proposal-services-terms.show');
Route::get('/proposal-services-terms/edit/{id}', 'App\Http\Controllers\tb_sales_tr_proposal_services_term_controller@edit')->name('proposal-services-terms.edit');
Route::put('/proposal-services-terms/update/{id}', 'App\Http\Controllers\tb_sales_tr_proposal_services_term_controller@update')->name('proposal-services-terms.update');
Route::delete('/proposal-services-terms/destroy/{id}', 'App\Http\Controllers\tb_sales_tr_proposal_services_term_controller@destroy')->name('proposal-services-terms.destroy');

// CONTRACTS
Route::resource('contracts', tb_sales_tr_contract_controller::class);
Route::get('/contract-proposals/create/{id}', 'App\Http\Controllers\tb_sales_tr_contract_proposal_controller@create')->name('contract-proposals.create');
Route::post('/contract-proposals/store/', 'App\Http\Controllers\tb_sales_tr_contract_proposal_controller@store')->name('contract-proposals.store');
Route::get('/contract-proposals/show/{id}', 'App\Http\Controllers\tb_sales_tr_contract_proposal_controller@show')->name('contract-proposals.show');
Route::get('/contract-proposals/edit/{id}', 'App\Http\Controllers\tb_sales_tr_contract_proposal_controller@edit')->name('contract-proposals.edit');
Route::put('/contract-proposals/update/{id}', 'App\Http\Controllers\tb_sales_tr_contract_proposal_controller@update')->name('contract-proposals.update');
Route::delete('/contract-proposals/destroy/{id}', 'App\Http\Controllers\tb_sales_tr_contract_proposal_controller@destroy')->name('contract-proposals.destroy');

//SOA
Route::resource('soas', tb_ar_tr_soa_controller::class);
Route::get('/soa-apps/searcher/{id}', 'App\Http\Controllers\tb_ar_tr_soa_app_controller@searcher')->name('soa-apps.searcher');
Route::post('/soa-apps/store/', 'App\Http\Controllers\tb_ar_tr_soa_app_controller@store')->name('soa-apps.store');
Route::delete('/soa-apps/destroy/{id}', 'App\Http\Controllers\tb_ar_tr_soa_app_controller@destroy')->name('soa-apps.destroy');

// OR
Route::resource('ors', tb_ar_tr_or_controller::class);
Route::get('/or-pay-cashes/create/{id}', 'App\Http\Controllers\tb_ar_tr_or_pay_cash_controller@create')->name('or-pay-cashes.create');
Route::post('/or-pay-cashes/store/', 'App\Http\Controllers\tb_ar_tr_or_pay_cash_controller@store')->name('or-pay-cashes.store');
Route::get('/or-pay-cashes/show/{id}', 'App\Http\Controllers\tb_ar_tr_or_pay_cash_controller@show')->name('or-pay-cashes.show');
Route::get('/or-pay-cashes/edit/{id}', 'App\Http\Controllers\tb_ar_tr_or_pay_cash_controller@edit')->name('or-pay-cashes.edit');
Route::put('/or-pay-cashes/update/{id}', 'App\Http\Controllers\tb_ar_tr_or_pay_cash_controller@update')->name('or-pay-cashes.update');
Route::delete('/or-pay-cashes/destroy/{id}', 'App\Http\Controllers\tb_ar_tr_or_pay_cash_controller@destroy')->name('or-pay-cashes.destroy');

Route::get('/or-pay-checks/create/{id}', 'App\Http\Controllers\tb_ar_tr_or_pay_check_controller@create')->name('or-pay-checks.create');
Route::post('/or-pay-checks/store/', 'App\Http\Controllers\tb_ar_tr_or_pay_check_controller@store')->name('or-pay-checks.store');
Route::get('/or-pay-checks/show/{id}', 'App\Http\Controllers\tb_ar_tr_or_pay_check_controller@show')->name('or-pay-checks.show');
Route::get('/or-pay-checks/edit/{id}', 'App\Http\Controllers\tb_ar_tr_or_pay_check_controller@edit')->name('or-pay-checks.edit');
Route::put('/or-pay-checks/update/{id}', 'App\Http\Controllers\tb_ar_tr_or_pay_check_controller@update')->name('or-pay-checks.update');
Route::delete('/or-pay-checks/destroy/{id}', 'App\Http\Controllers\tb_ar_tr_or_pay_check_controller@destroy')->name('or-pay-checks.destroy');
Route::get('/or-apps/searcher/{id}', 'App\Http\Controllers\tb_ar_tr_or_app_controller@searcher')->name('or-apps.searcher');
Route::post('/or-apps/merge/', 'App\Http\Controllers\tb_ar_tr_or_app_controller@merge')->name('or-apps.merge');


Route::get('/ar-lr-cust/aging-report', 'App\Http\Controllers\tb_ar_lr_cust_controller@ar_aging_report')->name('ar-lr-cust.aging-report');



Route::post('select2', 'App\Http\Controllers\select2_controller@index')->name('select2'); 

Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
