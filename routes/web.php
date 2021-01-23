<?php

use Illuminate\Support\Facades\Route;
use App\Models\SubCounty;

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

Route::view('/', 'welcome');

// Route::view('/{any}/{something}','welcome');


Auth::routes();
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::view('/home', 'home');
    Route::get('/dashboard/home', 'App\Http\Controllers\DashboardController@home');
    Route::get('/dashboard/users', 'App\Http\Controllers\DashboardController@users');
    Route::get('/dashboard/user/{id}', 'App\Http\Controllers\DashboardController@user')->name('user.profile');
    Route::get('/dashboard/patient/add', 'App\Http\Controllers\DashboardController@addPatientForm')->name('new.patient');
    Route::get('/dashboard/donor/add', 'App\Http\Controllers\DashboardController@addDonorForm')->name('new.donor');
    Route::get('/dashboard/blood-bank/add', 'App\Http\Controllers\DashboardController@addBankForm')->name('new.bank');
    Route::post('/dashboard/users/add', 'App\Http\Controllers\UsersController@new_user')->name('new.user');
    Route::get('/dashboard/users/{id}', 'App\Http\Controllers\DashboardController@user');
    Route::post('/dashboard/users/delete/{id}', 'App\Http\Controllers\DashboardController@deleteUser')->name('user.delete');
    Route::get('/data', function () {
        $path = storage_path() . "/data/counties.json";
    
        $json = json_decode(file_get_contents($path), true);
       
        foreach ($json as $county) {
            $count = $county['name'];
            $sub_counties =  $county['sub_counties'];
            foreach ($sub_counties as $name) {
                $subcName = $name;
                $subc = new SubCounty;
    
                $subc->name =$subcName;
    
                $subc->save();
            }
        }
    
        dd("Sub-counties data written to the database successfully");
    });

    Route::get('/client/appeal', 'App\Http\Controllers\UsersController@new_appeal')->name('client.new.appeal');
    Route::get('/client/appeal/confirm', 'App\Http\Controllers\UsersController@new_appeal_confirm')->name('client.new.appeal.confirm');
    Route::get('/dashboard/notifications', 'App\Http\Controllers\DashboardController@notifications')->name('notifications');
    Route::get('/dashboard/notifications/read/{id}', 'App\Http\Controllers\DashboardController@notificationRead')->name('notification.read');

    Route::get('/dashboard/appeals', 'App\Http\Controllers\DashboardController@appeals')->name('appeals');
    Route::get('/dashboard/appeals/{id}', 'App\Http\Controllers\DashboardController@appealAction')->name('appeal.action');


    //Blood bank blood appeal

    Route::get('/dashboard/bank/appeal', 'App\Http\Controllers\DashboardController@bankAppealForm')->name('bank.appeal.form');
    Route::post('/dashboard/bank/appeal', 'App\Http\Controllers\DashboardController@bankAppeal')->name('blood.bank.appeal');


    Route::get('/dashboard/donation/new', 'App\Http\Controllers\DonationsController@form')->name('donation.form');
    Route::post('/dashboard/donation/new', 'App\Http\Controllers\DonationsController@create')->name('donation.create');
    Route::get('/dashboard/donations', 'App\Http\Controllers\DonationsController@donations')->name('donations');
    //Reports
    Route::get('/dashboard/export/pdf', 'App\Http\Controllers\DonationsController@pdf')->name('donations.pdf');
    Route::get('/dashboard/usa/report', 'App\Http\Controllers\DashboardController@usersReport')->name('users.report');

    //Blood Bank Blood transfer
    Route::get('/dashboard/bank/blood/transfer/{id}', 'App\Http\Controllers\DashboardController@bloodTransferForm')->name('bank.blood.transfer');
    Route::post('/dashboard/bank/blood/transfer', 'App\Http\Controllers\DashboardController@bloodTransfer')->name('blood.transfer');

    //Blood Banks List reports
    Route::get('/dashboard/banks', 'App\Http\Controllers\DashboardController@banksForm')->name('banks.list');
    Route::post('/dashboard/banks', 'App\Http\Controllers\DashboardController@banksList')->name('banks.list');
    Route::get('/dashboard/banks/list/report/{county}', 'App\Http\Controllers\DashboardController@banksListReport')->name('banks.list.report');

    //Donors List reports
    Route::get('/dashboard/donors', 'App\Http\Controllers\DashboardController@donorsForm')->name('donors.list');
    Route::post('/dashboard/donors', 'App\Http\Controllers\DashboardController@donorsList')->name('donors.list');
    Route::get('/dashboard/donors/list/report/{county}', 'App\Http\Controllers\DashboardController@donorsListReport')->name('donors.list.report');
    Route::get('/dashboard/download/qrcode/{id}', 'App\Http\Controllers\DashboardController@downloadqr')->name('qrcode.download');
    //Donor History
    Route::get('/donor/history/{id}', 'App\Http\Controllers\DashboardController@donorHistory')->name('donor.history');

    //Donor History
    Route::get('/bb/report/form', 'App\Http\Controllers\DashboardController@bbReportForm')->name('bb.report.form');
    Route::post('/bb/report', 'App\Http\Controllers\DashboardController@bbReport')->name('bb.report');

    //BB Detailed report
    Route::get('/dashboard/bb/detailed/report/{county}', 'App\Http\Controllers\DashboardController@bbDReport')->name('bb.D.report');
});


Route::get('/client/register', 'App\Http\Controllers\UsersController@new_user_form')->name('client.new.user');
Route::post('/client/register', 'App\Http\Controllers\UsersController@new_user')->name('client.new.user');


Route::get('/client/donor/register', 'App\Http\Controllers\UsersController@new_donor_form')->name('client.new.donor');
Route::post('/client/register', 'App\Http\Controllers\UsersController@new_user')->name('client.new.user');
