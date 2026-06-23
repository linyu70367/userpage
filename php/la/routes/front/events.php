<?php

use App\Http\Controllers\About\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/events', [EventController::class, "index"]); #超連結用GET
