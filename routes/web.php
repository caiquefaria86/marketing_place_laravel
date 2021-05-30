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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

Route::prefix('cart')->name('cart.')->group(function(){
    
    Route::get('/', 'CartController@index')->name('index');
    Route::post('add', 'CartController@add')->name('add');
    Route::get('remove/{slug}', 'CartController@remove')->name('remove');
    Route::get('cancel', 'CartController@cancel')->name('cancel');


});

Route::get('/model', function(){
    // $user = new \App\User();
    // $user->name = 'Usuario teste';
    // $user->email = 'teste@teste.com';
    // $user->password = bcrypt('123456');

    // // return $user->save();
    // \App\User::all() returna todos os usuarios
    // \App\User::all()
    // where('name', 'Leilani Runolfsdottir')->get() com where
    // \App\User::paginate(10) -- paginação
    return  \App\User::all();

});

Route::group(['middleware' => ['auth']], function(){

    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

        /*     Route::prefix('stores')->name('stores.')->group(function(){
        
                Route::get('/','StoreController@index')->name('index');
                Route::get('/create','StoreController@create')->name('create');
                Route::post('/store','StoreController@store')->name('store');
                Route::get('/{store}/edit','StoreController@edit')->name('edit');
                Route::post('/update/{store}','StoreController@update')->name('update');
                Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
                
        
            }); */
        
            Route::resource('products', 'ProductController');
            Route::resource('stores', 'StoreController');
            Route::resource('categories', 'CategoryController');

            Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
        
        });
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
