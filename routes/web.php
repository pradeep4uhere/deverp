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
    return view('auth.login');
});
Route::get('/login', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {

    Route::group(['middleware' => 'auth','prefix' =>'seller'], function () {
        Route::get('/list', 'SellerController@index')->name('sellerList');
        Route::get('/updatesellerstatus/{seller_id}/{status}', 'SellerController@updateSellerStatus')->name('updatesellerstatus');
        Route::get('/show/{id}', 'SellerController@show')->name('sellerShow');
        Route::get('/edit/{id}', 'SellerController@edit')->name('sellerEdit');
        Route::get('/invoice/{orderId}', 'SellerController@orderInvoice')->name('orderInvoice');
        Route::get('/orderlist/{id}', 'SellerController@orderList')->name('orderList');

    });
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::get('/blank', 'HomeController@blank')->name('blank');

    //Get All Order List
    Route::get('allOrder','OrderController@allOrderList')->name('allOrder');
    Route::post('allOrder','OrderController@allOrderList')->name('allOrder');
    Route::get('customerList','UserController@allCustomerList')->name('customerList');
    Route::get('productList','UserProductController@allProductList')->name('productList');


    //All Masster Category Goes Here
    Route::any('locations','MasterController@stateList')->name('statelist');
    Route::any('distict/{state_name}','MasterController@distictList')->name('distict');
    Route::any('addnewlocation/{state_name}','MasterController@addnewlocation')->name('distictlocation');
    Route::any('savelocation','MasterController@savelocation')->name('savelocation');
    Route::any('editlocation/{id}','MasterController@editlocation')->name('editlocation');
    Route::any('updatelocation/{id}','MasterController@updateLocation')->name('updatelocation');
    Route::any('getdistrict/{state}','MasterController@getDistrict')->name('getdistrict');
    Route::any('getlocation/{state}/{district}','MasterController@getLocation')->name('getlocation');


    //CMS Section 
    Route::any('/setting', 'SettingController@setting')->name('setting');
    Route::post('/savesetting', 'SettingController@saveSetting')->name('savesetting');
    Route::any('alluserlist','GeneralController@allUserList')->name('alluserlist');
    Route::any('allsubscriberlist','GeneralController@allSubscribeList')->name('allsubscriberlist');
    Route::any('allmenu','PageController@allMenuList')->name('allmenu');
    Route::any('allmenumanage','PageController@allMenuListManage')->name('allmenumanage');
    Route::any('addmenu','PageController@addMenu')->name('addmenu');
    Route::any('editmenu/{id}','PageController@editMenu')->name('editmenu');
    Route::any('deletemenu/{id}','PageController@deleteMenu')->name('deletemenu');
    Route::any('addcontent/{id}','PageController@addPageContent')->name('addcontent');
    Route::any('contentlist/{id}','PageController@pageContentList')->name('contentlist');
    Route::any('deletepagecontent/{id}','PageController@deletePageContent')->name('deletepagecontent');
    Route::any('deletecontentimage/{id}','PageController@deletePageContentImage')->name('deletecontentimage');
    Route::any('editcontent/{id}','PageController@editPageContent')->name('editcontent');
    Route::any('copypage/{id}','PageController@copyPageContent')->name('copypage');
    Route::any('allpages','PageController@allPageList')->name('allpages');
    Route::get('createpage','PageController@createPage')->name('createpage');
    Route::post('createpage','PageController@createPage')->name('createpage');
    Route::any('editpage/{id}','PageController@editpage')->name('editpage');
    Route::any('deletepage/{id}','PageController@deletepage')->name('deletepage');
    Route::any('uploadpdf','PageController@uploadpdf')->name('uploadpdf');
    Route::any('saveuploadpdf','PageController@saveuploadpdf')->name('saveuploadpdf');
    Route::any('pdflist','PageController@pdflist')->name('pdflist');
    Route::any('deletepdf/{id}','PageController@deletepdf')->name('deletepdf');

    //Location
    //Route::get('location','LocationController@allLocation')->name('location');
    //Route::get('updatestatus/{id}/{status}','LocationController@updatestatus')->name('updatestatus');
    //Route::get('deletelocation/{id}','LocationController@deletelocation')->name('deletelocation');
    //Route::get('addnewlocation','LocationController@addnewlocation')->name('addnewlocation');
    //Route::any('addLocation','LocationController@addLocation')->name('addLocation');
    //Route::any('addnewlocation','LocationController@addnewlocation')->name('addnewlocation');
    //Route::any('editlocationpage/{id}','LocationController@editpage')->name('editlocationpage');
    //Route::any('editlocation/{id}','LocationController@editlocation')->name('editlocation');
    //Route::any('locationlist','LocationController@locationlist')->name('locationlist');
 

});