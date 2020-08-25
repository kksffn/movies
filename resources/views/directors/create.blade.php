@extends('master')
@section('title', 'New Director')


@section('content')

	<form action="{{ url('directors') }}" method="post">

		<h1>New Director</h1>

		<p>
			<input type="text" name="first_name" placeholder="First Name" required= "true">
		</p>
		<p>
			<input type="text" name="last_name" placeholder="Last Name" required= "true">
		</p>
		<p>
			<input type="text" name="country" placeholder="Country" required= "true">
		</p>
		<p>
			<input type="date" name="birthdate" placeholder="Birthdate" required= "true">
		</p>

		<p class="submit">
			<input type="submit" value="add new director">
			<a href="{{ url() }}">back</a>
		</p>

	</form>

@endsection
