<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
Route::get('/clear', function() {
    $exitCode = Artisan::call('optimize');
    $exitCode = Artisan::call('config:cache');

    return 'sDONE'; //Return anything
});
Route::get('/','HomeController@index') ->name('login');
Route::get('/aa/{user}','HomeController@aa') ->name('aa');
Route::get('/admin_login','HomeController@admin_login')->name('admin.login');
Route::post('/check','HomeController@check_login')->name('admin.check.login');
Route::get('/logout','HomeController@logout')->name('logout');
Route::get('/agency','HomeController@agency')->name('home.agency');
Route::get('/services/{service}','HomeController@services')->name('home.services');
Route::get('/contact','HomeController@contact')->name('home.contact');
Route::get('/about','HomeController@about')->name('home.about');
Route::get('/check','HomeController@check')->name('home.check');
Route::get('/check_mobile/{user}','HomeController@check_mobile')->name('home.check.mobile');
Route::get('/check_product/{user}','HomeController@check_product')->name('home.check.product');
Route::get('/check_info/{poll}','HomeController@check_info')->name('home.check.info');
Route::get('/produce/{product}','HomeController@produce')->name('home.produce');


Route::middleware(['auth'])->group(function(){
//    Route::resource('Article', 'ArticleController');
////    Route::get('Article/create/{user}', 'ArticleController@create')->name('Article.create');
////    Route::post('Article/{user}', 'ArticleController@store')->name('Article.store');
////    Route::get('Article/{user}', 'ArticleController@index')->name('Article.index');
//    Route::post('/pay_meet/{user}','HomeController@pay_meet')->name('home.pay.meet');
//    Route::get('/go_class/{meet}','HomeController@go_class')->name('home.go.class');
    Route::post('/cancel_class','HomeController@cancel_class')->name('home.cancel.class');
});


Route::middleware(['auth'])->group(function(){
    Route::resource('cats', 'CatController')->middleware(['role:admin']);
    Route::resource('products', 'ProductController')->except('show')->middleware(['role:admin']);;
    Route::resource('part', 'PartController')->middleware(['role:admin']);;
    Route::resource('service', 'ServiceController')->middleware(['role:admin']);;
    Route::resource('customers', 'CustomerController')->middleware(['role:admin']);;
    Route::resource('version', 'VersionController')->middleware(['role:admin']);;
    Route::resource('color', 'ColorController')->middleware(['role:admin']);;
    Route::resource('setting', 'SettingController')->middleware(['role:admin']);;
    Route::resource('slider', 'SliderController')->middleware(['role:admin']);;
    Route::resource('products.gallery', 'ProductGalleryController')->middleware(['role:admin']);;
    Route::any('/sell/{barcode}','BarcodeController@sell')->name('barcode.sell')->middleware(['role:admin|service|producer']);;
    Route::post('/record_voice/{barcode}','BarcodeController@record_voice')->name('repair.record.voice')->middleware(['role:admin|service|producer']);;
    Route::post('/remove_voice','BarcodeController@remove_voice')->name('repair.remove.voice')->middleware(['role:admin|service|producer']);;
    Route::resource('transfer', 'TransferController') ->middleware(['role:admin|operator|producer|service']);;
    Route::resource('barcode', 'BarcodeController') ->middleware(['role:admin|operator|producer']);;
    Route::get('/repair_barcode','RepairController@repair_barcode')->name('repair.barcode')->middleware(['role:admin|service|producer']);;

    Route::get('/go_ready_sms/{repair}','RepairController@go_ready_sms')->name('repair.ready.sms')->middleware(['role:admin|service']);;;;
    Route::get('/go_deliver_sms/{repair}','RepairController@go_deliver_sms')->name('repair.deliver.sms')->middleware(['role:admin|service']);
//    Route::get('/deliver_form/{repair}','RepairController@deliver_form')->name('repair.deliver.form')->middleware(['role:admin|service']);;;;
//    Route::post('/deliver_submit/{repair}','RepairController@deliver_submit')->name('repair.deliver.submit')->middleware(['role:admin|service']);;;;
    Route::any('/add_images/{repair}','RepairController@add_images')->name('repair.add.images')->middleware(['role:admin|service']);
    Route::resource('repair', 'RepairController')->middleware(['role:admin|service|producer']);;
    Route::resource('poll', 'PollController')->middleware(['role:admin']);;
    Route::get('/form','ReportController@form')->name('admin.form')->middleware(['role:admin']);;;
    Route::get('/stock','ReportController@stock')->name('admin.stock')->middleware(['role:admin']);;;
    Route::get('/print_receipt/{repair}','ReportController@print_receipt')->name('repair.print.receipt')->middleware(['role:admin|service']);;;;
    Route::get('/print_factor/{repair}','ReportController@print_factor')->name('repair.print.factor')->middleware(['role:admin|service']);;;;
    Route::get('/print_customer/{repair}','ReportController@print_customer')->name('repair.print.customer')->middleware(['role:admin|service']);;;;



});

Route::prefix('admin')->namespace('admin')->group(function(){
    Route::post('/get_shahr/{ostan}','AdminController@get_shahr')->name('admin.get.shahr');
    Route::post('/get_part/{product}','AdminController@get_part')->name('admin.get.part');
    Route::post('/get_logger/{product}','AdminController@get_logger')->name('admin.get.logger');
});
 Route::prefix('admin')->namespace('admin')->middleware(['auth','checkadmin'])->group(function(){
    Route::get('/','AdminController@index')->name('admin.index')->middleware(['role:admin']);;;
    Route::get('/setting','AdminController@settings')->name('admin.settings')->middleware(['role:admin']);;;
//    گزارشات

//     کارمندان
    Route::get('/staff','AdminController@staff')->name('admin.staff')->middleware(['role:admin']);;
    Route::get('/staff_create','AdminController@staff_create')->name('staff.create')->middleware(['role:admin']);;
    Route::post('/staff_store','AdminController@staff_store')->name('staff.store')->middleware(['role:admin']);;
    Route::post('/staff_update/{user}','AdminController@staff_update')->name('staff.update')->middleware(['role:admin']);;
    Route::post('/staff_destroy/{user}','AdminController@staff_destroy')->name('staff.destroy')->middleware(['role:admin']);;
    Route::get('/staff_edit/{user}','AdminController@staff_edit')->name('staff.edit')->middleware(['role:admin']);;


    //     حسابداری
    Route::get('/all_account','AccountantController@all')->name('admin.accountant.all')->middleware(['role:admin|accountant']);
    Route::get('/edit_account/{barcode}','AccountantController@edit')->name('admin.accountant.edit')->middleware(['role:admin|accountant']);
    Route::post('/update_account/{barcode}','AccountantController@update')->name('admin.accountant.update')->middleware(['role:admin|accountant']);
// مشتری ها
    Route::get('/customer','AdminController@customer')->name('admin.customer')->middleware(['role:admin']);;
    Route::get('/customer_create','AdminController@customer_create')->name('customer.create')->middleware(['role:admin']);;
    Route::post('/customer_store','AdminController@customer_store')->name('customer.store')->middleware(['role:admin']);;
    Route::post('/customer_update/{user}','AdminController@customer_update')->name('customer.update')->middleware(['role:admin']);;
    Route::get('/customer_edit/{user}','AdminController@customer_edit')->name('customer.edit')->middleware(['role:admin']);;
    Route::post('/customer_destroy/{user}','AdminController@customer_destroy')->name('customer.destroy')->middleware(['role:admin']);;
    Route::post('/attributes_value}','AdminController@attributes_value')->name('attributes.value')->middleware(['role:admin']);;
    Route::post('/parts_value','AdminController@parts_value')->name('parts.value')->middleware(['role:admin']);;

//گزارش خرابی
     Route::get('/repair_list','AdminController@repair_list')->name('repair.list')->middleware(['role:admin|service|producer']);;
     Route::get('/repair_list2','AdminController@repair_list2')->name('repair.list2')->middleware(['role:admin|service']);;
    //  کپی محصول
     Route::get('/copy_product/{product}','AdminController@copy_product')->name('copy.product')->middleware(['role:admin']);;

//    Route::resource('languages', 'LanguageController');


});
