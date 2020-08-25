
<tr>

    {{-- DIRECTOR --}}
    <td>
        <a href="{{ url('director/'. $movie -> director_id) }}">
            {{ $movie->director }}
        </a>
    </td>

    {{-- MOVIE TITLE --}}
    <td>
        <a href="{{ url('movie/'.$movie->id) }}">
            <strong>{{$movie ->title}}</strong>
        </a>

    </td>
    {{-- YEAR --}}
    <td>{{$movie ->year}}</td>

    {{-- GROSS --}}
    <td>$ {{number_format($movie ->gross, 2)}}</td>

    {{-- GENRE --}}
    <td>
        @include('_partials.genre')
    </td>

    {{-- EDIT LINKS --}}
    <td>
        <a href="{{ url('movie/' . $movie -> id . '/edit') }}">
            edit
        </a>
        <a href="{{ url('movie/' . $movie -> id . '/delete') }}">
            delete
        </a>
    </td>
</tr>


