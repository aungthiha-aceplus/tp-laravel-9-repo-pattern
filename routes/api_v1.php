<?php

/**
 * API V1 Routes File
 * call inside api\v1\ controller file
 * prefix url api/v1
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('blogs/pagination', [BlogController::class, 'pagination']);
Route::apiResource('blogs', BlogController::class);
