<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get("/admin/home", [AdminController::class, "home"])->middleware("manager");
route::get("/admin", [AdminController::class, "login"]);
route::get("/admin/loginv2", [AdminController::class, "loginv2"]);
route::post("/admin/login", [AdminController::class, "doLogin"]);