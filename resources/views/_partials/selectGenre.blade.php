

<?php use App\Genre;$genreModel = new Genre();
if (isset($movie) ) {
    $genres = $movie ->genre;
}else{
    $genres =' ';
}$parser = explode(',', $genres);
?>

@foreach($genreModel -> getGenres() as $genre)
    <input type="checkbox" name="{{ $genre->name }}" value="{{ $genre->id }}"

    @foreach($parser as $movie_genre)
        {{($movie_genre== $genre->name) ? $checked = 'checked' : $checked = ''}} {{$checked}}
    @endforeach>

    <label for="{{ $genre->name }}">{{ $genre->name }}</label>
    <br>
@endforeach




