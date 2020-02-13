<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    
    public function store(Request $request)
    {
        //TODO: Make it new rules file under Request

        $validator = Validator::make($request->all(), [
            'text' => 'required',
            'expired_at' => 'required',
        ]);

        if ($validator->fails()) {
            return "FAILED";
        }

        $message = new Message;

        $slug = Str::random(10);
        $message->slug = $slug ;
        $message->text = Crypt::encryptString($request->text);

        if($request->expired_at == 'one_time'){
            $message->is_onetime = true;
        }else{
            $expired_at = Carbon::now()->add($request->expired_at.' hours');
            $message->expired_at = $expired_at;
        }
       
        if ($request->password) {
                $message->password = bcrypt($request->password);
        }

        $message->save();

        return Response::json([
                'success' => true,
                'slug' => $slug
            ],201);
    }

    
    public function show($slug)
    {
        
        $message = Message::where('slug', $slug)
                            ->whereNull('read_at')
                            ->first();
        
        $message_data= [];
        
        if($message){

            if($message->is_onetime){
                $this->update($message);
            }

            $message_text =  Crypt::decryptString($message->text);

            $message_data = [
                'message_text' => $message_text,
                'expired_at'  => $message->expired_at
            ];
        }
        
        return view('message.show', ['message_data' => $message_data]);
    }


    public function update($message){
    
        $message->expired_at = Carbon::now();
        $message->read_at = Carbon::now();
        $message->save();
    }

}
