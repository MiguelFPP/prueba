<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index']);

Route::resource('persons', PersonController::class)->names('admin.persons');
