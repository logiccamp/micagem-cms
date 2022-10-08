<?php

use App\Http\Controllers\FrontendController;
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



Auth::routes();

if(env('APP_ENV') !== "local"){
    if(request()->getPathInfo() !== "/" && request()->getPathInfo() != "/about-us") return abort(404);
}
Route::get('/', [FrontendController::class, 'index'])->name("Homepage");
Route::get('/about-us', [FrontendController::class, 'about'])->name("aboutpage");
Route::get('/services', [FrontendController::class, 'services'])->name("servicePage");
Route::get('/portfolio', [FrontendController::class, 'collections'])->name("collectionsPage");
Route::get('/teams', [FrontendController::class, 'team'])->name("teampage");
Route::get('/collections/{title}', [FrontendController::class, 'collectionsCat'])->name("collectionsPage");
Route::get('/contact', [FrontendController::class, 'contact'])->name("contactPage");
Route::get('/thank-you', [FrontendController::class, 'thankyou'])->name("thankyou");
Route::post('/submitQuote', [FrontendController::class, 'submitQuote'])->name("submitQuote");
Route::post('/contactMessage', [FrontendController::class, 'contactMessage'])->name("contactMessage");
