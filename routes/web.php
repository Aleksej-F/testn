<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

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
 Route::get('/project', function () {
     return view('project');
 });
 Route::get('/login', function () {
     return view('login');
 });

// Route::get('/news', [NewsController::class, 'index']);
// Route::get('/news/{id}', [NewsController::class, 'show']);

Route::get('/', [HomeController::class, 'index']);

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
Route::group(['prefix' => 'admin', 'as' => 'admin'], function() {
	Route::resource('/categories', AdminCategoryController::class);
	Route::resource('/news', AdminNewsController::class);
});



