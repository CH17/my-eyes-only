<?php

use Illuminate\Http\Request;

Route::post('/message', 'MessageController@store');
//Route::get('/message/{slug}',  'MessageController@show');