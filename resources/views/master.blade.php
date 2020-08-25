<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'MOVIES')</title> <!--Zde se dá nastavit default hodnota - pokud neexistuje sekce 'title'-->

    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{url('css/main.css')}}">


</head>

<body>

    @include('_partials.alert')

    <form action="{{ url('director/choose') }}" method="post" class="navigation">
        <a class="home" href="{{ url('') }}">home</a>

        <?php use App\Director;$director_model = new Director; ?>

        @include('_partials.selectDirector', [ 'submit' => true] , ['create' => false])
    </form>

    <form action="{{ url('genre/choose') }}" method ="post" class="navigation">
        @include('_partials.selectGenreRoll', ['submit' => true])

        <a href="{{ url('director/create') }}">new director</a>
        <a href="{{ url('movie/create') }}">new movie</a>
        <a href="{{ url('genre/create') }}">new genre</a>
    </form>

    <form action="{{ url('search') }}" method= "post"  class="navigation" style="position: absolute; left: 75%">
        <input type="text" name="search" placeholder="Search" class="search" required="true">
        <p class="search"  style="position: relative; left: 0px">
            <input type="submit" value="Search">
        </p>
    </form>
    <br><br><br><br>

    @yield('content')

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/script.js') }}"></script>
</body>

</html>
