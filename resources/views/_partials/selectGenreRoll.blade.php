<?php use App\Genre;$genreModel = new Genre();
if (app('request') -> segment(1) == 'genre') {
    $selected = (app('request')->segment(2));
}
else $selected='';
?>

<select name="genre_name" onchange="{{ $submit ? 'this.form.submit()' : '' }}" required>

        <option value="..">All genres</option>
        @foreach( $genreModel -> getGenres() as $genre )
            <option {{ ($selected == $genre -> name) ? 'selected' : '' }}
                value="{{$genre->name}}">{{$genre->name}} </option>
        @endforeach
</select>

