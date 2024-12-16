<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("registrations", [RegistrationController::class, "index"])->name("registrations.index");
Route::post("registrations", [RegistrationController::class, "store"])->name("registrations.store");
Route::get("registrations/{registrations}", [RegistrationController::class, "show"])->name("registrations.show")->whereNumber("registrations");
Route::delete("registrations/{registrations}", [RegistrationController::class, "destroy"])->name("registrations.destroy")->whereNumber("registrations");
Route::get("registrations/count", [RegistrationController::class, "count"])->name("registrations.count");

