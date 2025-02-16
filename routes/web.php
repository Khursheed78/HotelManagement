<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AdminController::class,'index']);
// Route::get('/index',[AdminController::class,'index']);
// Route::get('/admin',[AdminController::class,'admin']);
Route::get('/create_room',[AdminController::class,'create_room'])->name('admin/create_room');
Route::post('/add_room', [AdminController::class, 'add_room'])->name('admin.add_room');
Route::get('/show_roomdetails', [AdminController::class, 'show_roomdetails'])->name('admin.show_roomdetails');
Route::get('/edit-room/{id}', [AdminController::class, 'editRoom'])->name('admin.edit_room');
Route::put('/update_room/{id}', [AdminController::class, 'updateRoom'])->name('admin.update_room');

Route::delete('/delete-room/{id}', [AdminController::class, 'deleteRoom'])->name('admin.delete_room');

Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings')
->middleware(['auth','admin']);

Route::delete('/delete_booking/{id}', [AdminController::class, 'delete_booking'])->name('admin.delete_booking');
Route::get('/approve_booking/{id}', [AdminController::class, 'approve_booking'])->name('admin.approve_booking');
Route::get('/reject_booking/{id}', [AdminController::class, 'reject_booking'])->name('admin.reject_booking');


Route::get('/gallery', [AdminController::class, 'gallery'])->name('admin.gallery');
Route::post('/gallery/uploadimage', [AdminController::class, 'uploadimage'])->name('admin.uploadimage');
Route::delete('/gallery/delete_image/{id}', [AdminController::class, 'delete_image'])->name('admin.delete_image');




Route::get('/home/room_details/{id}', [HomeController::class, 'room_details'])->name('home.room_details');

Route::post('/home/add_booking/{id}', [HomeController::class, 'add_booking'])->name('home.add_booking');

Route::post('add_message', [HomeController::class, 'add_message'])->name('home.add_message');
Route::get('show_messages', [AdminController::class, 'show_messages'])->name('admin.show_messages');
Route::delete('/delete_message/{id}', [AdminController::class, 'delete_message'])->name('admin.delete_message');
Route::get('send_message/{id}', [AdminController::class, 'send_message'])->name('home.send_message');
Route::post('mail/{id}', [AdminController::class, 'mail'])->name('home.mail');






Route::get('/ourgallery',[HomeController::class,'ourgallery'])->name('home.ourgallery');
Route::get('/ourroom',[HomeController::class,'ourroom'])->name('home.ourroom');
Route::get('/abouts',[HomeController::class,'abouts'])->name('home.abouts');
Route::get('/contactus',[HomeController::class,'contactus'])->name('home.contactus');
Route::get('/contactus',[HomeController::class,'contactus'])->name('home.contactus');

// For Practics
// Route::get('/ourgallery',[HomeController::class,'ourgallery'])->name('home.ourgallery');
// Route::get('/ourroom',[HomeController::class,'ourroom'])->name('home.ourroom');
// Route::get('/abouts',[HomeController::class,'abouts'])->name('home.abouts');
// Route::get('/contactus',[HomeController::class,'contactus'])->name('home.contactus');
// Route::get('/contactus',[HomeController::class,'contactus'])->name('home.contactus');

// For Controller
// Route::get('/ourgallery',[HomeController::class,'ourgallery'])->name('home.ourgallery');
// Route::get('/ourroom',[HomeController::class,'ourroom'])->name('home.ourroom');
// Route::get('/abouts',[HomeController::class,'abouts'])->name('home.abouts');
// Route::get('/contactus',[HomeController::class,'contactus'])->name('home.contactus');
// Route::get('/contactus',[HomeController::class,'contactus'])->name('home.contactus');
// For Route
// Route::get('/ourgallery',[HomeController::class,'ourgallery'])->name('home.ourgallery');
// Route::get('/ourroom',[HomeController::class,'ourroom'])->name('home.ourroom');
// Route::get('/abouts',[HomeController::class,'abouts'])->name('home.abouts');
// Route::get('/contactus',[HomeController::class,'contactus'])->name('home.contactus');
// Route::get('/contactus',[HomeController::class,'contactus'])->name('home.contactus');





// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('Home.index');
//     })->name('dashboard');
// });


// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

