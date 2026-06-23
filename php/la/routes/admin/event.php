<?php

use App\Http\Controllers\Admin\Event\AdminEventController;
use Illuminate\Support\Facades\Route;

Route::middleware("manager")->group(function(){
    //group群組。以下所有路由都要經過manager這個middleware檢查是否有登入過
    Route::prefix("/admin/event")->group(function(){
        Route::get("list",[AdminEventController::class,"index"]);
        Route::get("create",[AdminEventController::class,"create"]);
        Route::post("store",[AdminEventController::class,"store"]);
        Route::get("edit{id}",[AdminEventController::class,"edit"]);
        Route::post("update",[AdminEventController::class,"update"]);
        Route::post("delete",[AdminEventController::class,"delete"]);
        /*
            prefix前置詞，目的讓以下的網址可以省略/admin/event
            /admin/event/list
            /admin/event/create
            /admin/event/store
            /admin/event/edit/1
            /admin/event/update
            /admin/event/delete
        */
    });
});