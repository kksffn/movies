<?php

$genres = $movie -> genre;
$parser = explode(',', $genres);
?>
@foreach($parser as $genre)
    <a href=" {{ url('genre/'.$genre) }}">
        {{$genre}}
    </a>
@endforeach
