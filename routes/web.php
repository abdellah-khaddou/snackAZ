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

use Illuminate\Support\Facades\Auth;


Route::group(['prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){ //...

    // debut route

    Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function (){
        Route::get('/', 'admin\AdminController@index');

        //route users
        Route::resource('/users','admin\UsersController');

        //route clients
        Route::resource('/clients','admin\ClientController');
        Route::resource('/employes','admin\EmployeController');
        Route::resource('/fournisseurs','admin\FournisseurController');
        Route::resource('/catagories','admin\CatagoryController');
        //Route::get('/produits/{cat}','admin\ProduitController@showProduitCat')->name('admin.produits.showproduitcat');
        Route::resource('/produits','admin\ProduitController');
        Route::get('/produits/produitcat/{cat}','admin\ProduitController@showProduitCat')->name('admin.produits.showproduitcat');
        Route::get('/produits/produitcat/{val}/create ','admin\ProduitController@create');

        //achat des produit
        Route::get('/achat','admin\AchatProduitController@index')->name('achat.index');
        Route::post('/achat/add-to-achat/{id}','admin\AchatProduitController@addAchat')->name('achat.add');
        Route::post('/achat/change-to-achat/{id}','admin\AchatProduitController@changeAchat')->name('achat.change');
        Route::post('/achat/delete-to-achat/{id}','admin\AchatProduitController@deleteAchat')->name('achat.delete');
        Route::get('/ses',function (){
           session()->flash('cart');
        });

        // livraisons
        Route::resource('/livrisons','admin\LivrisonController')->except('create');



    });
    Route::get('datatable/lang','DataTableController@lang');




    Route::get('/',function (){
        return view('home');
    });
    //fin route
    Route::get('/admin/login','Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::post('/admin/login','Auth\LoginController@login')->name('admin.login');
    Route::post('/admin/logout','Auth\LoginController@logout')->name('admin.logout');
    Route::get('/admin/password/reset','Auth\ForgotPasswordController@showLinkAdminRequestForm')->name('admin.password.request');
    Route::get('/admin/password/reset/{token}','Auth\ResetPasswordController@showResetAdminForm')->name('admin.password.reset');
    Auth::routes();

});
/*

Route::get('/', function (){
    return view('home');
});
Route::group(['prefix'=>'admin'],function (){

    Route::get('/login','admin\AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','admin\AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/', 'admin\AdminController@index')->name('admin.index');
});

Route::group(['prefix'=>'client'],function (){


});
*/


