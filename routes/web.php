<?php



Route::get('/', array('as' => 'home', function()
{
    return view('home');
}));

Route::get('/m/{slug}',  array('as' => 'message', 'uses' => 'MessageController@show'));