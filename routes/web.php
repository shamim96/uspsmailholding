<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

// Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/test','TestController@test')->name('test');

Route::get('/','LandingController@index')->name('home');
Route::get('/terms-and-conditions','LandingController@terms')->name('terms');
Route::get('/privacy-policy','LandingController@privacy')->name('privacy');
Route::get('/aboutus','LandingController@about')->name('about');

Route::group(['middleware'=>'guest'],function () {
    Route::get('/login', 'LoginController@login')->name('front.login');
    Route::post('/login', 'LoginController@attemptLogin')->name('front.attemptLogin');
});
Route::get('/contact-us', 'ContactController@contact')->name('front.contact');
Route::post('/contact-us-post', 'ContactController@store')->name('front.contact.store');

Route::get('/hold-mail', 'HoldMailController@pageHoldMail')->name('front.page.hold-mail');
Route::post('/create-checkout-id', 'HoldMailController@createCheckoutId')->name('front.createCheckoutId');


Route::get('/thank-you', 'HoldMailController@thankYou')->name('front.page.thankYou');

Route::post('/set-temp-data', 'HoldMailController@holdMailTempData')->name('front.setTempData');
Route::get('/get-temp-data', 'HoldMailController@getAllTempData')->name('front.getTempData');

Route::get('/cancel-update', 'CancelOrderController@cancelUpdatePage')->name('front.cancelUpdatePage');
Route::post('/cancel-update', 'CancelOrderController@cancelUpdatePagePost')->name('front.cancelUpdatePagePost');
Route::post('/cancel-hold-mail', 'CancelOrderController@cancelHoldMail')->name('front.cancelHoldMail');
Route::post('/update-hold-mail', 'CancelOrderController@updateHoldMail')->name('front.updateHoldMail');
Route::get('/cancel-hold-mail', function (){
    return redirect()->route('front.cancelUpdatePage');
});

//axois
Route::get('/get-current-address-validation-api', 'AddressAPIController@getCurrentApi')->name('front.getCurrentAddressValidationApi');
// Here from Admin section

Route::group(['middleware'=>'admin'],function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'axios'], function () {
            Route::get('/all-order-statuses', 'OrderStatusesController@axiosAllStatuses');
            Route::get('/all-order-renewal-dates/{orderId}', 'OrderRenewalReminderController@axiosAllRenewalDatesByOrder');
            Route::post('/set-new-renewal-date-for-order/{orderId}', 'OrderRenewalReminderController@axiosSetNewRenewalDate');
            Route::get('/delete-new-renewal-date-for-order/{renewalId}', 'OrderRenewalReminderController@axiosDeleteRenewalDatesByRenewalId');
        });


        Route::get('/logout', 'LoginController@logout')->name('admin.logout');
        Route::get('/password-reset', 'UserController@passwordReset')->name('admin.passwordReset');
        Route::post('/password-reset', 'UserController@passwordResetPost')->name('admin.passwordReset.post');
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::get('/admins', 'UserController@admins')->name('admin.admins');
        Route::get('/create-admin', 'UserController@createAdmin')->name('admin.admin.create');
        Route::post('/create-admin', 'UserController@createAdminPost')->name('admin.admin.create.post');
        Route::get('/user-password-reset/{userId}', 'UserController@userPasswordReset')->name('admin.userPasswordReset');
        Route::post('/user-password-reset/{userId}', 'UserController@userPasswordResetPost')->name('admin.userPasswordReset.post');
        Route::get('/delete-admin/{userId}', 'UserController@deleteAdmin')->name('admin.deleteAdmin');
        Route::get('/contacts', 'ContactController@all')->name('admin.allContacts');
        Route::get('/contact-details/{id}', 'ContactController@contactById')->name('admin.contactDetails');
        Route::get('/delete-contact/{id}', 'ContactController@deleteContact')->name('admin.deleteContact');

        Route::get('/all-header-scripts', 'ScriptController@allHeaderScripts')->name('admin.allHeaderScripts');
        Route::get('/add-header-script', 'ScriptController@addHeaderScript')->name('admin.addScript.header');
        Route::post('/add-header-script', 'ScriptController@addHeaderScriptPost')->name('admin.addScript.header.post');
        Route::get('/delete-header-script/{id}', 'ScriptController@deleteHeaderScript')->name('admin.deleteHeaderScript');
        Route::get('/edit-header-script/{id}', 'ScriptController@editHeaderScript')->name('admin.editScript.header');
        Route::post('/edit-header-script/{id}', 'ScriptController@updateHeaderScript')->name('admin.editScript.header.post');


        Route::get('/all-thank-you-scripts', 'ScriptController@allThankYouScripts')->name('admin.allThankYouScripts');
        Route::get('/add-thank-you-script', 'ScriptController@addThankYouScript')->name('admin.addScript.thankYou');
        Route::post('/add-thank-you-script', 'ScriptController@addThankYouScriptPost')->name('admin.addScript.thankYou.post');
        Route::get('/delete-thank-you-script/{id}', 'ScriptController@deleteThankYouScript')->name('admin.deleteThankYouScript');
        Route::get('/edit-thank-you-script/{id}', 'ScriptController@editThankYouScript')->name('admin.editScript.thankYou');
        Route::post('/edit-thank-you-script/{id}', 'ScriptController@updateThankYouScript')->name('admin.editScript.thankYou.post');


        Route::get('/all-dispute-scripts', 'ScriptController@allDisputeScripts')->name('admin.allDisputeScripts');
        Route::get('/add-dispute-script', 'ScriptController@addDisputeScript')->name('admin.addScript.Dispute');
        Route::post('/add-dispute-script', 'ScriptController@addDisputeScriptPost')->name('admin.addScript.Dispute.post');
        Route::get('/delete-dispute-script/{id}', 'ScriptController@deleteDisputeScript')->name('admin.deleteDisputeScript');
        Route::get('/edit-dispute-script/{id}', 'ScriptController@editDisputeScript')->name('admin.editScript.Dispute');
        Route::post('/edit-dispute-script/{id}', 'ScriptController@updateDisputeScript')->name('admin.editScript.Dispute.post');



        Route::get("/all-status",'OrderStatusesController@index')->name('admin.allStatus');
        Route::get("/new-status",'OrderStatusesController@create')->name('admin.createStatus');
        Route::post("/new-status",'OrderStatusesController@store')->name('admin.createStatus.post');
        Route::get("/update-status/{id}",'OrderStatusesController@edit')->name('admin.editStatus');
        Route::post("/update-status/{id}",'OrderStatusesController@update')->name('admin.updateStatus');
        Route::get("/delete-status/{id}",'OrderStatusesController@destroy')->name('admin.deleteStatus');

        //orders
        Route::get("/all-orders/bystatus/{id}",'AdminController@allOrdersByStatus')->name('admin.allOrdersByStatus');
        Route::get("/all-orders",'AdminController@allOrders')->name('admin.allOrders');
        Route::post("/all-orders",'AdminController@searchAllOrders')->name('admin.searchAllOrders');
        Route::get("/all-cancelled-orders",'AdminController@allCancelledOrders')->name('admin.allCancelledOrders');
        Route::get("/all-updated-orders",'AdminController@allUpdatedOrders')->name('admin.allUpdatedOrders');


        Route::get("/order-details/{id}",'AdminController@orderDetails')->name('admin.orderDetails');
        Route::get("/edit-order/{id}",'AdminController@editOrder')->name('admin.editOrder');
        Route::post("/edit-order/{id}",'AdminController@updateOrder')->name('admin.updateOrder');
        Route::get("/delete-order/{id}",'AdminController@deleteOrder')->name('admin.deleteOrder');


        //Reminders for renewal
        Route::get("/order-renewal-dates/{orderId}",'OrderRenewalReminderController@index')->name('admin.orderRenewalDates');
        Route::post("/update-renewal-date/{dateId}",'OrderRenewalReminderController@updateRenewalDate')->name('admin.updateRenewalDate');
        Route::get("/all-renewal-dates",'OrderRenewalReminderController@allRenewalDates')->name('admin.allRenewalDates');
        Route::get("/all-renewal-today",'OrderRenewalReminderController@allRenewalByDate')->name('admin.allRenewalByDate');
        Route::post("/all-renewal-today",'OrderRenewalReminderController@allRenewalByDate')->name('admin.allRenewalByDatePost');


        //Alerts
        Route::get("/all-alerts",'AlertController@allAlerts')->name('admin.allAlerts');
        Route::get("/notification/{id}",'AlertController@notification')->name('admin.notification');
        Route::get("/mark-all-notification-read",'AlertController@markAllRead')->name('admin.markAllRead');
        Route::get("/delete-all-alerts",'AlertController@deleteAllAlert')->name('admin.deleteAllAlert');

        //Address validation API
        Route::get("/all-address-api",'AddressAPIController@index')->name('admin.allAddressApi');
        Route::get("/new-address-api",'AddressAPIController@create')->name('admin.createAddressApi');
        Route::post("/new-address-api",'AddressAPIController@store')->name('admin.createAddressApi.post');
        Route::get("/update-address-api/{id}",'AddressAPIController@edit')->name('admin.editAddressApi');
        Route::post("/update-address-api/{id}",'AddressAPIController@update')->name('admin.updateAddressApi');
        Route::get("/delete-address-api/{id}",'AddressAPIController@destroy')->name('admin.deleteAddressApi');


    }); });



