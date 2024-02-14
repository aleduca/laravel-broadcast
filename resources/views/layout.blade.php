<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Broadcast</title>
  <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Protest+Revolution&display=swap" rel="stylesheet">
  @vite(['resources/js/app.js','resources/css/app.css'])
</head>
<body>
  <div class="container">
    <section>
      @if(auth()->check())
      Olá, {{ auth()->user()->name }}
      <form action="{{ route('login.destroy') }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
      @else
      Olá visitante <a href="{{ route('login.index') }}">Login</a>
      @endif
    </section>
    @yield('content')
  </div>
</body>
</html>
