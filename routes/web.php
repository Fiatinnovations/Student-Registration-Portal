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
use Illuminate\Support\Facades\Input;
use App\Prospect;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/***Agents Routes Starts****/

Route::get('students', 'ProspectController@students')->name('students')->middleware('auth');


/***Agents Routes Ends****/


/***Prospects Routes Starts****/

Route::get('prospects', 'ProspectController@index')->name('prospects')->middleware('auth');
Route::get('createprospect', 'ProspectController@createProspect')->name('createProspect')->middleware('auth');
Route::Post('saveprospect', 'ProspectController@store')->name('storeProspect')->middleware('auth');
Route::get('prospect/{slug}', 'ProspectController@show')->name('prospect')->middleware('auth');
Route::put('admission/{slug}', 'ProspectController@admission')->name('admission')->middleware('auth');
Route::get('prospect/program/{id}', 'ProspectController@editFirst')->where('id', '\d+')->name('programReg')->middleware('auth');
Route::PUT('prospect/program/update/{id}', 'ProspectController@updateFirst')->where('id', '\d+')->name('updateprogram')->middleware('auth');
Route::get('portfolio/{id}', 'ProspectController@edu')->name('educationUpdate')->where('id', '\d+')->middleware('auth');
Route::PUT('updateportfolio/{id}', 'ProspectController@updateEdu')->name('saveEdu')->where('id', '\d+')->middleware('auth');
Route::get('documents/{id}', 'ProspectController@documentUpload')->name('documents')->where('id', '\d+')->middleware('auth');
Route::PUT('updatepCert/{id}', 'ProspectController@saveCertificates')->name('saveCert')->where('id', '\d+')->middleware('auth');
Route::PUT('updatepTrans/{id}', 'ProspectController@saveTranscripts')->name('saveTrans')->where('id', '\d+')->middleware('auth');
Route::PUT('updatepResume/{id}', 'ProspectController@saveResume')->name('saveResume')->where('id', '\d+')->middleware('auth');
Route::PUT('updatepMotive/{id}', 'ProspectController@saveMotivation')->name('saveMotive')->where('id', '\d+')->middleware('auth');
Route::get('payment-proof/{id}', 'ProspectController@getPayment')->name('getPayment')->where('id', '\d+')->middleware('auth');
Route::PUT('payment/{id}', 'ProspectController@savePayment')->middleware('auth')->name('uploadPayment')->where('id', '\d+');
Route::get('admissionOffer/{id}', 'ProspectController@offer')->middleware('auth')->name('admissionOffer')->where('id', '\d+');
Route::get('updateProspect/{id}', 'ProspectController@updateProspect')->middleware('auth')->name('prospectUpdate')->where('id', '\d+');
Route::PUT('saveUpdate/{id}', 'ProspectController@saveProspectUpdate')->middleware('auth')->name('saveUpdate')->where('id', '\d+');
Route::get('deleteProspect/{id}', 'ProspectController@delete')->middleware('auth')->name('deleteProspect')->where('id', '\d+');

/***Prospects Routes Ends****/

/*******Admin Routes */

Route::get('admin', 'AdminUserController@index')->name('admin')->middleware('auth');

/***Prospect Search */

Route::any('/search', function(){
    $q = Input::get('q');
    $agentProspects =  Auth::User()->prospects()->where('first_name', 'LIKE', '%'.$q.'%')->orWhere('last_name', 'LIKE', '$'.$q.'%')->get();
    if($agentProspects){
        return view('prospects.search', compact('agentProspects'))->withDetails($agentProspects)->withQuery($q);
    }else{
         return view('prospects.search')->withErrors(['message'=>'prospect not found']);
    }

})->name('search')->middleware('auth');
