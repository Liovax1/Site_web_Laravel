<!doctype html>
<head>
    <title>
    Accueil
    </title>
    <link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts/partials/_header')
    <main class="site-content">
    @yield('content')
    </main>
    @include('layouts/partials/_footer')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
</body>

<style>
    #header {
        border: 1px solid #000000;
        background-color:#acacb2;
        padding: 0px;
        width:100%;
        height:50px;
    }   
    #footer {
        border: 1px solid #000000;
        background-color:#acacb2;
        height: 50px;
        padding: 0px;
        width:100%;
    }
    #accueil {
        width:80px; margin-left:10px;
    }
    #apropos {
        width:85px; margin-left:165%;
    }
    #connexion {
        width:100px; margin-left:75%;
    }
    button {
        display: inline-block;
        background-color: blue;
        border-radius: 10px;
        border: 4px double #cccccc;
        color: #eeeeee;
        text-align: center;
        font-size: 13px;
        padding: 10px;
        width: 200px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
    }

    button:hover {
        background-color: #7b38d8;
    }
    body {
        margin: 0;
	    min-height: 100vh;
	    display: grid;
	    grid-template-rows: auto 1fr auto;
    }
    .site-content {
        margin-left:10px;
    }
</html>