<?php
if (isset($director)) {
    $category = 'director';
    $item = $director->id;
}
elseif (isset($genre)) {
    $category = 'genre';
    $item = $genre->name;
}
elseif (isset($movie)) {
    $category = 'movie';
    $item = $movie->id;
}
?>
<form action="{{ url($category.'/'.$item.'/'.'delete') }}" method="post">
    <input type="hidden" name="_method" value="PUT">
    <p class="submit">
        <input type="submit" value="YES, delete ...">
        <a href="{{ url($category.'/' . $item) }}">NO!</a>
    </p>

</form>
