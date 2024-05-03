<?php

use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\DeleteUserController;
use App\Http\Controllers\User\GetAllUsersController;
use App\Http\Controllers\User\GetUserByIdController;
use App\Http\Controllers\User\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//user
Route::post('/create-user', CreateUserController::class)->name('user.create');
Route::get('/get-user-by-id/{userId}', GetUserByIdController::class)->name('user.get.by.id');
Route::get('/users', GetAllUsersController::class)->name('user.get.all');
Route::put('/update-user/{userId}', UpdateUserController::class)->name('user.update');
Route::delete('/delete-user/{userId}', DeleteUserController::class)->name('user.delete');
