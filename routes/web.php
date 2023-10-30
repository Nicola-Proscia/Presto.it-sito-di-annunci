<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use App\Livewire\Index;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AnnouncementController::class, 'homepage'])->name('home');

Route::get('/announcement/index', [AnnouncementController::class, 'index'])->name('announcements.index');

// Rotte auth
Route::get('/announcement/create', [AnnouncementController::class, 'create'])->middleware('auth')->name('announcement.create');

Route::get('revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

// Route::get('/dashboard',[PublicController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::post('/contactEmail', [RevisorController::class, 'contactEmail'])->middleware('auth')->name('contactMail');

Route::put('/revisor/update/{user}', [RevisorController::class, 'update'])->middleware('auth')->name('revisor.update');




// Rotte revisor
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

Route::patch('/ripensaci/annuncio/{announcement}',[RevisorController::class, 'undoAnnouncement'])->middleware('isRevisor')->name('revisor.undo_announcement');



// Rotte pubbliche
Route::get('/search/announcement', [AnnouncementController::class, 'searchAnnouncement'])->name('search.announcement');

Route::get('announcement/index', [AnnouncementController::class, 'index'])->name('announcement.index');

Route::get('/announcement/{category}', [AnnouncementController::class, 'categoryShow'])->name('category.show');

Route::get('/announcement/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');

Route::get('/revisor/new/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('/search', 'PublicController@index')->name('search');

//Rotta Bandierine
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('set_language_locale');

