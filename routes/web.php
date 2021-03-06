<?php

use Carbon\Carbon;
use App\Events\TestEvent;
use App\Jobs\SendEmailJob;
use App\Mail\SendEmailMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/import','Test\TestController@importFile');
Route::post('/import','Test\TestController@importFile');



//payment form
Route::get('/pay', 'PaymentController@index');
// route for processing payment
Route::post('paypal', 'PaymentController@payWithpaypal');
// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');


Route::get('/ok', function () {
    return "ok message return";
});


Route::get('/event', 'EventTestController@index');

Route::get('/nevent', function(){
    event(new TestEvent("this is message box from web php line"));
});
//------------------
Route::get('/sendemail', function(){
    Mail::to('new@gmail.com')->send(new SendEmailMailable);

    return ('email is send successfully');
});

// Route::get('jobsendemail', function(){   
//     //dispatch(new SendEmailJob());
//     $Job = (new SendEmailJob())->delay(Carbon::now()->addSeconds(5));
//         dispatch($Job);
//     return ('email is send successfully');
// });

//Route::get('/mail', 'SendEmailController@testmail');   //sending mail use mailtrap

Route::get('/jobmail', 'SendEmailController@processQueue');    //job 

Route::get('/facadeex', function() {                       //Facades
    return TestFacades::testingFacades();
 });
