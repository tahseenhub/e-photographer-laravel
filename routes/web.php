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





Route::get('/', 'HomeController@index')->name('home.index');
// Route::get('/',function(){
//     // $exitCode = Artisan::call('route:cache');
//     $exitCode = Artisan::call('config:cache');
//     $exitCode = Artisan::call('cache:clear');
//     $exitCode = Artisan::call('view:clear');
//     return redirect('/home')->name('home.index');
//     // return "done";x  
//     // return redirect()->action('HomeController@index')->name('home.index');
// });
Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/profile/{id}', 'profileController@index')->name('profile.index');
Route::post('/user/feedback', 'FeedbackController@index')->name('Feedback.index');
Route::get('/shoots/{id}/{category_id}', 'HomeController@ajaxShoots');
Route::get('/shoots_category/{category}', 'HomeController@ajaxShootsCategory');
Route::get('/ajax_search_shoots/{str}', 'HomeController@ajaxSearchShoots');
Route::get('/popupcontest', 'HomeController@popup')->name('home.popup');
Route::get('/exhibition/{id}', 'HomeController@exhibition')->name('home.exhibition');


Route::post('photographer/joinContest', 'PhotographerController@joinContest');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/messenger', 'MessengerController@index')->name('messenger.index');
    Route::post('/messenger/{id}', 'MessengerController@sendMessage')->name('messenger.sendMessage');
    Route::get('/messenger/{id}', 'MessengerController@selectUser')->name('messenger.selectUser');

    Route::prefix('admin')->group(function(){
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::get('/users', 'AdminController@users')->name('admin.users');
        Route::get('/users/add/{id}', 'AdminController@usersAdd')->name('admin.usersAdd');
        Route::get('/users/block/{id}', 'AdminController@usersBlock')->name('admin.usersBlock');
        Route::get('/shoots', 'AdminController@shoots')->name('admin.shoots');
        Route::get('/contests', 'AdminController@contests')->name('admin.contests');
        Route::post('/addContest', 'AdminController@addContest')->name('admin.addContest');
        Route::get('/exhibition', 'AdminController@exhibition')->name('admin.exhibition');
        Route::post('/addExhibition', 'AdminController@addExhibition')->name('admin.addExhibition');
        Route::get('/addExhibitionImagesPage/{id}', 'AdminController@addExhibitionImagesPage')->name('admin.addExhibitionImagesPage');
        Route::post('/addExhibitionImages', 'AdminController@addExhibitionImages')->name('admin.addExhibitionImages');
        Route::get('/editMainExhibition/{id}', 'AdminController@editMainExhibition')->name('admin.editMainExhibition');
        Route::post('/postEditMainExhibition', 'AdminController@postEditMainExhibition')->name('admin.postEditMainExhibition');
        Route::get('/editExhibitionImages/{id}', 'AdminController@editExhibitionImages')->name('admin.editExhibitionImages');
        Route::post('/editImage', 'AdminController@editImage')->name('admin.editImage');
        Route::get('/orders', 'AdminController@orders')->name('admin.orders');
        Route::get('/settings', 'AdminController@settings')->name('admin.settings');
        Route::get('/history', 'AdminController@history')->name('admin.history');
        Route::get('/search_users/{str}', 'AdminController@ajaxSearchUsers');
        Route::get('/shoot/delete/{id}', 'AdminController@shootDelete')->name('admin.shootDelete');
        Route::get('/ajax_users_status/{str}', 'AdminController@ajaxUsersStatus');
        Route::get('/ajax_users_type/{str}', 'AdminController@ajaxUsersType');
        Route::get('/ajax_free_shoots/{str}', 'AdminController@ajaxFreeShoots');

    });
    Route::prefix('photographer')->group(function(){
        Route::get('/', 'PhotographerController@index')->name('photographer.index');
        Route::get('/profile', 'PhotographerController@profile')->name('photographer.profile');
        Route::post('/profile/update', 'PhotographerController@profileUpdate');
        Route::post('/addshoot', 'PhotographerController@addshoot');
        Route::get('/order_details/{shoot_id}/{user_id}', 'photographerController@orderDetails')->name('photographer.orderDetails');
        Route::get('/shoots/{id}/{category_id}', 'photographerController@ajaxShoots')->name('photographer.ajaxShoots');
        Route::get('/shoots_category/{category}', 'PhotographerController@ajaxShootsCategory')->name('photographer.ajaxShootsCategory');
        Route::post('/add_comment', 'PhotographerController@addComment')->name('photographer.addComment');
        Route::get('/add_like/{shoot_id}', 'PhotographerController@addLike')->name('photographer.addLike');
        Route::get('/edit_shoot/{shoot_id}', 'PhotographerController@editShoot');
        Route::post('/editShootSubmit', 'PhotographerController@editShootSubmit');
        Route::get('/rejectHireReq/{hire_id}', 'PhotographerController@rejectHireReq')->name('rejectHireReq');
        Route::get('/acceptHireReq/{hire_id}', 'PhotographerController@acceptHireReq')->name('acceptHireReq');
        
        // Route::get('/events', 'photographerController@jobs')->name('photographer.events');

    });
    Route::prefix('client')->group(function(){
        Route::get('/', 'ClientController@index')->name('client.index');
        Route::get('/profile', 'ClientController@profile')->name('client.profile');
        Route::post('/profile/update', 'ClientController@profileUpdate');
        Route::post('/hire_photographer', 'ClientController@hirePhotographer');
        Route::get('/shoots_category/{category}', 'ClientController@ajaxShootsCategory')->name('client.ajaxShootsCategory');

    });
    Route::get('/order_page/{cart_id}','OrderController@orderPage')->name('order.orderPage');    
    Route::post('/order_confirmation','OrderController@orderConfirmation')->name('order.orderConfirmation');
    Route::get('/eventDetails/{event_id}', 'EventsController@eventDetails')->name('event.eventDetails');
    Route::get('/allEvents', 'EventsController@allEvents')->name('allEvents');
    Route::get('/deleteEvent/{$event_id}', 'EventsController@deleteEvent')->name('deleteEvent');

});
// Route::get('/signin/type', 'SigninController@type')->name('signin.type');
Route::get('/signin', 'SigninController@index')->name('signin.index');


Route::get('/signup', 'SignupController@photographer')->name('signup.photographer');
Route::get('/signup/photographer', 'SignupController@photographer')->name('signup.photographer');
Route::get('/signup/client', 'SignupController@client')->name('signup.client');
Route::get('/signout', 'SignoutController@index')->name('signout.index');

Route::get('/add_to_cart/{shoot_id}/{user_id}', 'CartController@ajaxAddToCart');
Route::get('/cart_delete/{cart_id}', 'CartController@cartDelete')->name('cart.cartDelete');

Route::get('/getmac',function()
    {
        $shellexec = exec('getmac'); 
        dd($shellexec);
    });

Auth::routes();

Route::get('login/google/{user_type}', 'Auth\RegisterController@redirectToProvider')->name('google_signup');
Route::get('register1', 'Auth\RegisterController@handleProviderCallback');

