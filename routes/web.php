<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\OrdersController;

use Admin\IndexController as AdminController;
use Admin\CategoryController as AdminCategoryController;
use Admin\NewsController as AdminNewsController;

/*/
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {return view('welcome');});
// Route::get('/new', function () {
//     return view('news');
// });
//  Route::get('/project', function () {
//      return view('project');
//  });
//  Route::get('/login', function () {
//      return view('login');
//  });

// Route::get('/news', [NewsController::class, 'index']);
// Route::get('/news/{id}', [NewsController::class, 'show']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/news', [NewsController::class, 'index']) 
    ->name('news');

Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id','\d+')
    ->name('news.show');

Route::get('/categories', [CategoryController::class, 'index']) 
    ->name('categories');

Route::get('/categories/{id}', [CategoryController::class, 'show']) 
    ->name('categories.show');

//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
	Route::get('/', AdminController::class)->name('index');
    Route::resource('/categories', AdminCategoryController::class);
	Route::resource('/news', AdminNewsController::class);
});


Route::get('/reviews', [ReviewsController::class, 'index']) ->name('reviews');
Route::match(['post','get'],'/reviews/store', [ReviewsController::class, 'store']) ->name('reviews.store');

Route::get('/orders', [OrdersController::class, 'index']) ->name('orders');
Route::match(['post','get'],'/orders/store', [OrdersController::class, 'store']) ->name('orders.store');