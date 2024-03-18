<!doctype html>
<head>
    <title>
    {{ Voyager::setting('site.title') }}
    </title>
    <link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts/partials/_header')
    @yield('content')
    @include('layouts/partials/_footer')

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
 <style>
    /* .custom-container-meteofox-page {
        border: 1px solid #000000;
        padding: 2px;
    }
    .custom-container-meteofox-entete {
        border: 1px solid #000000;
        background-color: #A1D4A1;
        padding: 0px;
    }   
    .custom-container-meteofox-piedPage {
        border: 1px solid #000000;
        background-color: #A1D4A1;
        padding: 0px;
    } */
</body>
</html>