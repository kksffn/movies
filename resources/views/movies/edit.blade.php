@extends('master')
@section('title', 'Edit Movie')


@section('content')

	<form action="{{ url('movie/' . $movie->id) }}" method="post">
		<input name="_method" type="hidden" value="PUT">

		<h1>Edit movie</h1>

		<p>
			<input value="{{ $movie->title }}" type="text" name="title" placeholder="Title" required= "true">
             {{-- value - přednastavené hodnoty--}}
		</p>
		<p>
            <select name="year" required>
                @for($i=0;$i<125;$i++)
                    <option {{($movie->year == 1900+$i) ? 'selected' : ''}}
                        value="{{1900+$i}}">{{1900+$i}}</option>;
                @endfor
            </select>

		</p>
		<p>
			<input value="{{ $movie->gross }}" type="number" name="gross" placeholder="Gross" required= "true" >
		</p>
		<p>
            @include('_partials.selectGenre')
		</p>
		<p>
			@include('_partials.selectDirector', [ 'submit' => false ], [ 'create' => true])
		</p>
		<p>
			<textarea name="summary" placeholder="About this movie">{{
				$movie->summary
			}}</textarea>
		</p>

		<p class="submit">
			<input type="submit" value="edit movie">
			<a href="{{ url('movie/' . $movie->id) }}">back</a>
		</p>

	</form>

@endsection
