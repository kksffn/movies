@extends('master')
@section('title', 'Edit Genre')

@section('content')

    <form action="{{ url('genre/'.$genre->name) }}" method="post">
        <input type="hidden" name="_method" value="PUT">

        <h1>Edit Genre</h1>
        <p>
            <input type="text" value="{{ $genre->name }}"
                   name="name" placeholder="Genre Name" required="true">
        </p>
        <p class="submit">
            <input type="submit" value="edit genre">
            <a href="{{ url('genre/' . $genre->name) }}">back</a>
        </p>
    </form>
@endsection
