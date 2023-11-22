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

use App\model\tweet;
use Illuminate\Support\Facades\Route;


//Default controllers

Route::get('/', function () {

    return view('default');
});


// Twitter controllers

Route::get('/tweety', function () {
    return view('welcome');
})->name('tweety');



    Route::group(['prefix' => 'tweety', 'middleware' => ['auth']], function(){

    Route::get('/tweets', 'TweetController@index')->name('home');
    Route::post('/tweets', 'TweetController@store');
    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy' );
    Route::post('/profiles/{user}/follow','FollowsController@store')->name('follow');
    Route::get('/profiles/{user}/edit','profilesController@edit')->middleware('can:edit,user');
    Route::patch('/profiles/{user}','profilesController@update')->middleware('can:edit,user');
    Route::get('/explore','ExploreController@index')->name('explore');
    Route::get('/profiles/{user}','profilesController@show')->name('profile');

    Route::get('/request/{user}', 'profilesController@request')->name('request');
    Route::put('/profiles/{id}/request','FollowsController@update')->name('update');
    Route::delete('/profiles/{id}/request','FollowsController@destroy')->name('delete');


    Route::get('/message','ChatController@index')->name('message');
    Route::get('/chat/{user}','ChatController@show')->name('chat');


    Route::post('/users/{id}','ChatController@store')->name('chatting');



});


// Amazon controllers


// Route::get('/amazon', function () {
//     return view('welcome');
// })->name('amazon');

// Route::middleware(['auth'])->group(function () {
    
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/amazon/amazon','CategoryController@index')->name('amazon');
Route::get('/amazon-search','CategoryController@search')->name('search');
Route::get('/amazon/search-view-{id}', 'CategoryController@view')->name('view');
Route::post('/amazon/add-to-cart/{id}','CategoryController@cart')->name('cart');
Route::get('/amazon/view-cart/{id}/cart','CategoryController@viewcart')->name('viewcart');
Route::delete('/amazon/view-cart/{id}/remove','ProductsController@productremove' )->name('remove');
Route::get('/amazon/view-cart/{id}/buy','CategoryController@buy')->name('buy');
Route::post('/amazon/view-cart/order/{id}','CategoryController@order')->name('order');
Route::post('/amazon/view/update','CategoryController@update')->name('update');


// });



Route::middleware(['admin'])->group(function () {

Route::get('/amazon/admin-panel','CategoryController@panel')->name('panel');
Route::get('/amazon/admin','CategoryController@admin')->name('admin');
Route::get('/amazon/admin-{id}-edit','CategoryController@edit')->name('edit');
Route::post('/amazon/admin-datastore','ProductsController@store')->name('datastore');

Route::patch('/amazon/admin-update-{id}','ProductsController@update')->name('update');
Route::delete('/amazon/admin/{id}/delete','ProductsController@remove')->name('destory');

Route::put('/amazon/admin/{id}/disapprove','ProductsController@disapprove')->name('disapprove');


Route::get('/amazon/admin-cartegory','AdminController@index')->name('category');
Route::post('/amazon/admin-category/store', 'AdminController@categorystore')->name('categorystore');
Route::get('/amazon/admin-cartegory/viewcategory','AdminController@viewcategory')->name('viewcategory');
Route::get('/amazon/admin-cartegory/adminsearch','AdminController@adminsearch')->name('adminsearch');
Route::get('/amazon/admin-view-users','AdminController@viewusers')->name('viewusers');

});










Auth::routes();




