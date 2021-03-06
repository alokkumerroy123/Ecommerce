
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>{{config('app.name')}}</title>

   

    

    <!-- Bootstrap core CSS -->
<link href="{{asset('assects/backend/css/bootstrap.min.css')}}" rel="stylesheet">

  


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
@include('frontend.partisal.header')

@if(session()->has('message'))
<p class="alert alert-{{session()->get('alert')}}">{{session()->get('message')}}</p>
@endif

<main>

@yield('main')

</main>

@include('frontend.partisal.footer')


    <script src="{{asset('assects/backend/js/bootstrap.bundle.min.js')}}"></script>

      
  </body>
</html>
