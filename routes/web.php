<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', [ItemController::class, 'index']);
Route::post('/update-items', array('as'=> 'update.items', [ItemController::class, 'updateItems']));
