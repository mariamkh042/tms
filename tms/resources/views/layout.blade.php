<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Tms</title>
  </head>
  <body>
    {{-- Show The Error or Succes Message --}}
    {{-- <div class="container">
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <li> {{$error}} </li>
            </div>
        @endforeach
    </ul>
@endif

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success')}}
</div>
@endif
</div> --}}

@yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>