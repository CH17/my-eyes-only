<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Eyes Only | Send your confidential message</title>
        <link rel="stylesheet" href="/css/app.css">

    </head>
    <body>
        <div id="app" class="flex-center position-ref full-height">  
            
            @include('layout.header')

           <div class="content pt-5 pb-5">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
                            @yield('content')
                        </div>
                        
                        <div class="col-md-4">
                            @include('layout.sidebar')
                        </div>
							
					</div><!--/.row-->
				</div><!--/.container-->
            </div><!--/.content-->
                
        </div>
        <script src="/js/app.js"></script>
    </body>

  
</html>
