<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('familles', [ApiController::class, 'getFamilles']);
