@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">  

        @if($message_data)
        <div class="bs-callout-info bs-callout">
            <h5 id="message_text mb-2">Your message: </h5>
            <p>Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the <code class="highlighter-rouge">.sr-only</code> class.</p>
        </div>

        {{ $message_data['message_text'] }}

        {{ $message_data['expired_at'] }}
        @else 
        <p> This message no longer exit!</p>
        @endif

    </div>
</div>
@endsection