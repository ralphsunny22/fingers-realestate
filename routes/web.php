<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'landing'])->name('landing');

Route::get('/admin', [AdminController::class, 'adminDashboard'])->name('adminDashboard');
Route::get('/admin-add-property', [PropertyController::class, 'addProperty'])->name('addProperty');
Route::post('/admin-add-property', [PropertyController::class, 'addPropertyPost'])->name('addPropertyPost');
Route::get('/ajax-create-property-feature', [PropertyController::class, 'ajaxAddFeature'])->name('ajaxAddFeature');
Route::get('/ajax-create-amenity-feature', [PropertyController::class, 'ajaxAddAmenity'])->name('ajaxAddAmenity');

//front
Route::get('/single-property/{id}', [PropertyController::class, 'singleProperty'])->name('singleProperty');
//reviews
Route::post('/add-review', [ReviewController::class, 'addReviewPost'])->name('addReviewPost');
Route::get('/ajax-create-review', [ReviewController::class, 'ajaxAddReview'])->name('ajaxAddReview');