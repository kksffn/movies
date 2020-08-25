<?php
    $selected = false;

//S kanónem na vrabce; jednodušší způsob přestal fungovat :(
    if (app('request') -> segment(1) == 'movie') {
        $movieModel = new \App\Movie;
        $movie = $movieModel->getMovie(app('request')->segment(2));
        $selected = $movie->director_id;
    }
    elseif  (app('request') -> segment(1) == 'director') $selected = app('request') -> segment(2);


//    if ( isset($director) ) {
//        $selected = $director->id;
//        echo 'director';
//    }
//    elseif (isset($movie)) {
//        $selected = $movie->director_id;
//        echo 'movie';
//    }

// TODO PŘESTALO FUNGOVAT! PROČ??? Nevím, kdy, nevím, proč...
// Podle toho, na které jsem stránce, mám buďto proměnnou $movie nebo $director,
// tedy mohu porovnávat id režiséra a podle toho ho vyznačit v rozbalovacím seznamu jako selected:

    $directorModel = new \App\Director;

?>

    {{--Pokuud je nastavený submit na true, formulář se při kliknutí na režiséra hned odešle--}}
	<select name="director_id" onchange="{{ $submit ? 'this.form.submit()' : '' }}" required>
        @if(!$create)
            <option value="..">All directors</option>
        @endif
		@foreach( $directorModel->getDirectors() as $director )
			<option {{ ($selected == $director ->id) ? 'selected' : '' }}
                    value="{{ $director->id }}">{{ $director->name }} </option>
		@endforeach
	</select>
