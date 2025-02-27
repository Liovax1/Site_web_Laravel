<!doctype html>

<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="Xbo7SfuPFa03DJGmcX6b4Y2YeZj0QsPJOYrVYz45">
    <title>{{ Voyager::setting('site.title') }}</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#ff8020">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/' .Voyager::setting('site.logo2')) }}">
    

<!-- JavaScript Bootstrap bundle (incluant Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
.custom-navbar-brand {
    margin-left: 30px;

}
.vertical-bar {
    border-right: 1px solid #000; 
    height: 20px; 
    margin-left: 20px; 
}

.map-container {
        border: 2px solid #007BFF;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }



body {
  --sb-track-color: #232e33;
  --sb-thumb-color: #5d5e63;
  --sb-size: 14px;
    padding-bottom: 130px;
}

body::-webkit-scrollbar {
  width: var(--sb-size)
}

body::-webkit-scrollbar-track {
  background: var(--sb-track-color);
  border-radius: 3px;
}

body::-webkit-scrollbar-thumb {
  background: var(--sb-thumb-color);
  border-radius: 3px;
  
}

@supports not selector(::-webkit-scrollbar) {
  body {
    scrollbar-color: var(--sb-thumb-color)
                     var(--sb-track-color);
  }
}

</style>

    </head>

<body>
    @include('layouts/partials/_header')
    <main class="site-content">
        @yield('content')
    </main>
    @include('layouts/partials/_footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z8w/Z5TCYG5vzWn1BfB6TY7k3ccxuracl4+eOA" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" integrity="sha384-KvshFF5O0x4tHc9tuX6Z9Gi7hxF4hIpjv82w5jFYy9HnEbTkcCE1vmK7oXs15Rnn" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>