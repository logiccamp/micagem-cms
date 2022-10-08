<?php

use App\Http\Controllers\BackEndController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\GeneralsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\TestimonialsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BackEndController::class, 'index']);
Route::get('/settings', [BackEndController::class, 'settings']);
Route::get('/edit-settings', [BackEndController::class, 'editsettings']);
Route::post('/edit-settings', [BackEndController::class, 'posteditsettings'])->name("editSettings");
Route::post('/updateLogo', [BackEndController::class, 'updateLogo'])->name("updateLogo");

Route::get('/socials', [SocialController::class, 'index']);
Route::post('/socials', [SocialController::class, 'store'])->name("updateSocial");
Route::post('/addsocials', [SocialController::class, 'addNew'])->name("addSocial");
Route::post('/deleteSocial', [SocialController::class, 'deleteSocial'])->name("deleteSocial");

Route::get('/services', [ServicesController::class, 'index']);
Route::get('/services/edit/{id}', [ServicesController::class, 'edit']);
Route::post('/services/updateService/{id}', [ServicesController::class, 'update'])->name("updateService");

Route::get('/getServicesapi', [ServicesController::class, 'getServicesapi'])->name("getServicesapi");
Route::get('/getServiceapi', [ServicesController::class, 'getServiceapi'])->name("getServiceapi");
Route::get('/deleteservice/{id}', [ServicesController::class, 'destroy'])->name("deleteservice");
Route::post('/addservices', [ServicesController::class, 'store'])->name('addService');

Route::group(["prefix" => "collections"], function(){
    Route::get('/', [CollectionsController::class, 'index']);
    Route::get('/add', [CollectionsController::class, 'create']);
    Route::post('/add', [CollectionsController::class, 'store'])->name('addCollection');
});

Route::get('/deleteCollection/{id}', [CollectionsController::class, 'destroy'])->name("deleteCollection");
Route::get('/getCollectionsapi', [CollectionsController::class, 'getCollectionsApi'])->name("getCollectionsapi");


Route::get('/pages/home', [PagesController::class, 'home']);
Route::get('/pages/about', [PagesController::class, 'about']);
Route::post('/pages/about', [PagesController::class, 'addabout'])->name("addAboutSlide");
Route::post('/pages/about/{id}', [PagesController::class, 'deleteSlide'])->name("deleteSlide");

Route::post('/changeHomeBanner', [PagesController::class, 'ChangeBannerHome'])->name("changeHomeBanner");
Route::post('/updateHomeBanner', [PagesController::class, 'updateHomeBanner'])->name("updateHomeBanner");
Route::post('/updateAboutContent', [PagesController::class, 'updateAboutContent'])->name("updateAboutContent");
Route::post('/updateMissionBanner', [PagesController::class, 'updateMissionBanner'])->name("updateMissionBanner");
Route::post('/missionContent', [PagesController::class, 'missionContent'])->name("missionContent");
Route::post('/visionContent', [PagesController::class, 'visionContent'])->name("visionContent");
Route::post('/updateVisionBanner', [PagesController::class, 'updateVisionBanner'])->name("updateVisionBanner");


Route::get('/testimonials', [TestimonialsController::class, 'index']);
Route::get('/testimonials/add', [TestimonialsController::class, 'create']);
Route::post('/testimonials/add', [TestimonialsController::class, 'store'])->name("addTestimonial");
Route::get('/testimonials/delete/{id}', [TestimonialsController::class, 'destroy']);

Route::get("/team", [TeamsController::class, 'index']);
Route::get("/team/add", [TeamsController::class, 'create']);
Route::post("/team/add", [TeamsController::class, 'store'])->name("addTeam");
Route::get("/team/delete/{id}", [TeamsController::class, 'destroy'])->name("destroy");
Route::get("/team/edit/{id}", [TeamsController::class, 'edit'])->name("editteam");
Route::post("/team/edit/{id}", [TeamsController::class, 'update'])->name("updateTeam");


Route::get("/clients", [ClientsController::class, 'index']);
Route::get("/clients/add", [ClientsController::class, 'create']);
Route::post("/clients/add", [ClientsController::class, 'store'])->name("addClient");
Route::get("/clients/delete/{id}", [ClientsController::class, 'destroy'])->name("destroyClient");
Route::get("/clients/edit/{id}", [ClientsController::class, 'edit'])->name("editClient");
Route::post("/clients/edit/{id}", [ClientsController::class, 'update'])->name("updateClient");


Route::get('/login', [BackEndController::class, 'login']);


Route::get("/general", [GeneralsController::class, 'index']);
Route::post("/general", [GeneralsController::class, 'updatePassword'])->name("updatePassword");
