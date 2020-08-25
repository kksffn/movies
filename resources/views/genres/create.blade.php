@extends('master')
@section('title', 'New Genre')


@section('content')

    <form action="{{ url('genres') }}" method="post">
        <h1>New Genre</h1>
        <p>
            <input type="text" name="genre" placeholder= "Type new genre name here" required="true">
        </p>
        <p class="submit">
            <input type="submit" value="add new genre">
            <a href="{{ url() }}">back</a>
        </p>
    </form>

@endsection
