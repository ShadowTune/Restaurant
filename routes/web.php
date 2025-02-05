<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/booking', function () {
    return view('booking');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('/testimonial', function () {
    return view('testimonial');
});

// Route for adding contact information
Route::post("/addcontact", [UserController::class, "AddContact"]);

// Routes for signup
Route::get('/signup', function () {
    return view('signup');  // Return the signup view
});

Route::post('/signup', [UserController::class, 'AddUser']);  // Handle the signup form submission

// Other routes for login, profile, etc., can be added as needed

// Display the login form (GET)
Route::get('/login', function () {
    return view('login');
});

// Handle the login form submission (POST)
Route::post('/login', [UserController::class, 'UserLogin']);

// Logout route
Route::get('/logout', [UserController::class, 'UserLogout']);

// Booking route 
Route::post('/booking', [UserController::class, 'BookTable']);

Route::post('/', [UserController::class, 'AddSubscriber']);