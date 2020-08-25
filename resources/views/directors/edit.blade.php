@extends('master')
@section('title', 'Edit Director')


@section('content')

	<form action="{{ url('director/' . $director->id) }}" method="post">
		<input type="hidden" name="_method" value="PUT">

		<h1>Edit Director</h1>

		<p>
			<input type="text" value="{{ $director->first_name }}"
			       name="first_name" placeholder="First Name">
		</p>
		<p>
			<input type="text" value="{{ $director->last_name }}"
			       name="last_name" placeholder="Last Name">
		</p>
		<p>
			<input type="text" value="{{ $director->country }}"
			       name="country" placeholder="Country">
		</p>
		<p>
			<input type="date" value="{{ $director->birthdate }}"
			       name="birthdate" placeholder="Birthdate">
		</p>

		<p class="submit">
			<input type="submit" value="edit director">
			<a href="{{ url('director/' . $director->id) }}">back</a>
		</p>

	</form>

@endsection
