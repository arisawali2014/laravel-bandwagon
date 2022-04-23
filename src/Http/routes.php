<?php

use Illuminate\Support\Facades\Route;

// Event controller
Route::get('/order-api/event', 'EventsController@index');
