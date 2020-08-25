@extends ('master')
@section('title', $movie -> title)

@section('content')

    <h1>{{$title}}</h1> <!-- Takto se vytvoří echo proměnné title! -->

    {{-- toto je iba kontrolny vypis nech viem, co som vytiahol z databazy --}}
    {{-- po skonceni kodenia toto vymazem --}}
    {{-- <?php echo '<pre>';
    print_r( $movie );
    echo '</pre>'; ?>
    --}}
    @if(isset($confirmation))
        <h2>DO YOU REALLY WANT TO DELETE THIS GREAT MOVIE?</h2><br>
    @endif
    <table>
        <thead>
        <tr>
            <th>director</th>
            <th>title</th>
            <th>year</th>
            <th>gross</th>
            <th>genre</th>
            <th>edit</th>
        </tr>

        </thead>
        <tbody>

            @include('_partials.movie')

        </tbody>
        <tfoot>
            <tr class="summary">
                <td colspan="5">{{ $movie->summary }}</td>
            </tr>
        </tfoot>
    </table>
    @if(isset($confirmation))
        @include('_partials.delete')
    @endif

@endsection
