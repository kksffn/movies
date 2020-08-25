@extends('master')
@section('title', 'New Movie')


@section('content')

	<form action="{{ url('movies') }}" method="post">

		<h1>New Movie</h1>

		<p>
			<input type="text" name="title" placeholder="Title" required= "true">
		</p>
		<p>
            <select name="year" required>
                @for($i=0;$i<130;$i++)
                    <option value="{{1900+$i}}">{{1900+$i}}</option>;
                @endfor
            </select>
			<!--<input type="number" name="year"  placeholder="Year" required= "true"> -->
		</p>
		<p>
			<input type="number" name="gross" placeholder="Gross" required= "true">
		</p>
		<p>
			@include('_partials.selectGenre')
		</p>
		<p>
			@include('_partials.selectDirector', [ 'submit' => false] , ['create' => true])
		</p>
		<p>
			<textarea name="summary" placeholder="About this movie" required= "true"></textarea>
		</p>

		<p class="submit">
			<input type="submit" value="add new movie">
			<a href="{{ url('') }}">back</a>
		</p>

	</form>

@endsection
