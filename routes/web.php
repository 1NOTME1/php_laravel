<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternalEventsController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"]);
Route::get("/internal-events", [InternalEventsController::class, "index"]);
Route::get("/internal-events/create", [InternalEventsController::class, "create"]);
Route::post('/internal-events/add-to-db', [InternalEventsController::class, 'addToDb']);
Route::get('/internal-events/edit/{id}', [InternalEventsController::class, 'edit']);
Route::post('/internal-events/update/{id}', [InternalEventsController::class, 'update']);
Route::get('/internal-events/delete/{id}', [InternalEventsController::class, 'delete']);
Route::get("/internal-events/add-attachment/{id}", [InternalEventsController::class, "addAttachment"]);
Route::post("/internal-events/add-attachment/{id}", [InternalEventsController::class, "addAttachmentToDB"]);
