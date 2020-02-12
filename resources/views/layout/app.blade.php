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


    <!-- header -->
        <header class="header header-sticky">
            <div class="container">
              <div class="row">
                <nav class="navbar navbar-expand-lg text-center">
                  <a href="#" class="navbar-brand order-1 order-lg-2">My Eyes Only</a>    
                </nav>
              </div>
            </div>
          </header>

            <div class=" content">
                @yield('content')
            </div>
        </div>
        <script src="/js/app.js"></script>
    </body>

  
</html>
