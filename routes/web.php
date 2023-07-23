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

// Threads

use App\Events\Notification;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Route::get('threads/{id}', 'ThreadController@show');
Route::get('create_thread', 'ThreadController@create');
Route::post('create_thread', 'ThreadController@store');
Route::get('threads/{id}/edit', 'ThreadController@edit');
Route::put('threads/{id}/edit', 'ThreadController@update');
Route::delete('threads/{id}','ThreadController@destroy');

// Static Pages
Route::get('about', function () {
    return view('pages.about', ['aboutflag' => true]);
});
Route::get('faq', function () {
    return view('pages.faq', ['faqflag' => true]);
});

// User
Route::get('users/{id}', 'UserController@show');
Route::get('users/{id}/friends', 'UserController@show_friends');
Route::get('reported/{id}/friends', 'UserController@show_friends');

// Search
Route::get('search', 'SearchController@show');
Route::post('search', 'SearchController@filterSearch');
Route::get('search_user', 'SearchController@showUserSearch');
Route::post('search_user', 'SearchController@filterUserSearch');

// News
Route::get('news', 'HomeController@showTopNews');
Route::get('topnews', 'HomeController@showTopNews');
Route::get('recentnews', 'HomeController@showRecentNews');

// Reviews
Route::get('reviews', 'HomeController@showTopReviews');
Route::get('topreviews', 'HomeController@showTopReviews');
Route::get('recentreviews', 'HomeController@showRecentReviews');

// Home
Route::get('/', 'HomeController@showTopThreads');
Route::get('/home', 'HomeController@showTopThreads');
Route::get('top', 'HomeController@showTopThreads');
Route::get('recent', 'HomeController@showRecentThreads');

// API
Route::delete('api/users/{id}/friends/{idFriend}', 'UserController@delete_friend');
Route::post('api/users/{id_sender}/friendrequest/{id_receiver}', 'UserController@sendRequest');
Route::post('api/users/{id_sender}/undofriendrequest/{id_receiver}', 'UserController@undoRequest');
Route::post('api/users/{id_sender}/acceptfriendrequest/{id_receiver}', 'UserController@acceptRequest');
Route::post('api/users/{id_sender}/declinefriendrequest/{id_receiver}', 'UserController@declineRequest');
Route::post('/api/threads/{id}/report/{idUser}', 'ThreadController@reportThread');
Route::delete('/api/threads/{id}/report/{idUser}', 'ThreadController@undoReportThread');
Route::post('/api/comments/{id}/report/{idUser}', 'CommentController@reportComment');
Route::delete('/api/comments/{id}/report/{idUser}', 'CommentController@undoReportComment');
Route::post('api/threads/{id}/upvote', 'ThreadController@upvote');
Route::post('api/threads/{id}/downvote', 'ThreadController@downvote');
Route::post('api/comments/{id}/upvote', 'CommentController@upvote');
Route::post('api/comments/{id}/downvote', 'CommentController@downvote');
Route::post('api/threads/{id}/comment','CommentController@storeComment');
Route::post('api/comments/{id}/reply', 'CommentController@storeReply');
Route::post('api/comments/{id}/edit', 'CommentController@update');
Route::delete('api/comments/{id}/delete', 'CommentController@destroy');
Route::get('/api/notificationAttr/{id}','UserController@notificationAttr');


// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');

Route::get('reset', 'Auth\ForgotPasswordController@showResetPassword')->name('password.reset');
Route::post('forgot', 'Auth\ForgotPasswordController@forgot');
Route::post('reset', 'Auth\ForgotPasswordController@reset');

//Settings
Route::get('settings/{id}', 'UserController@showSettings');
Route::get('users/{id}/edit', 'UserController@edit');
Route::put('users/{id}/edit', 'UserController@update');
Route::get('users/{id}/editpassword', 'UserController@editPassword');
Route::put('users/{id}/editpassword', 'UserController@updatePassword');
Route::get('users/{id}/editemail', 'UserController@editEmail');
Route::put('users/{id}/editemail', 'UserController@updateEmail');
Route::put('users/{id}/deleteaccount', 'UserController@destroy');

//Administration
Route::get('administration', 'UserController@showAdmin');
Route::get('reported/{id}', 'UserController@showReported');
Route::get('ban/{id}', 'UserController@banUser');
Route::get('banWithRedirect/{id}', 'UserController@banUserWithRedirect');
Route::get('unban/{id}', 'UserController@unbanUser');
Route::get('topposts/{id}', 'UserController@showTopPosts');
Route::get('awardadmin/{id}', 'UserController@awardAdmin');


