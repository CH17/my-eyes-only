<?php
use \App\Message;
use Illuminate\Support\Facades\Crypt;


Route::get('/', function () {
    return view('home');
});


Route::get('/m/{slug}', 'MessageController@show');


Route::get('/test', function () {

    // $messages = Message::all();

    // foreach($messages as $message){
    //     echo "Message: ". Crypt::decryptString($message->message);
    //     echo "<hr>";
    // }
    
    

printf("Now: %s", Carbon::now()->add('2 hours'));
});
