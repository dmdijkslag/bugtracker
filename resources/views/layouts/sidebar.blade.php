<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.head')
  </head>

  <body>

  @include('includes.header')
    <div class="container-fluid">
      <div class="row">
        @include('includes.sidebarLeft')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @include('flash::message')

            @yield('content')
        </div>
      </div>
    </div>

 @include('includes.jsFooter')

  </body>
</html>

