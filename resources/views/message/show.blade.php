@extends('layout.app')

@section('content')
    <div class="container">
            @if($message_data)
            <div class="bs-callout bs-callout-success mt-0">
                <h4>Message for you</h4>                
                <div class="text-font mt-3">
                    {{ $message_data['message_text'] }}
                </div>

            </div>
                <show-message expired_at="{{ $message_data['expired_at'] }}"></show-message>
            @else 
                <h4> This message no longer exit!</h4>
            @endif
            <div class="backto mt-4">
                <a class="btn btn-lg btn-success" href="{{ route('home') }}">Create Secret Message</a>
            </div>
    </div>
    
@endsection