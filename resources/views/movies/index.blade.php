@extends ('master')
@section('title', isset($title) ? $title : 'All movies')

@section('content')

    <h1>{{(isset($confirmation) AND $confirmation !== 'do not show' AND isset($director))
                    ? "DO YOU REALLY WANT TO DELETE THIS GREAT DIRECTOR?" : '' }}
        {{(isset($confirmation) AND $confirmation !== 'do not show' AND isset($genre))
                    ? 'DO YOU REALLY WANT TO DELETE THIS GENRE?' : '' }}
    </h1>
    <h1>

        {{isset($title) ? $title : 'All movies'}}

        @if( isset($director) AND (!isset($confirmation) OR $confirmation == 'do not show')) <!-- Pokud jsem na profilovce režiséra, vytvoříme link na edit-->
            <a href="{{ url('director/'.$director->id.'/edit') }}">edit</a>
            <a href="{{ url('director/'.$director->id.'/delete') }}">delete</a>
        @endif
        @if( isset($genre) AND !isset($confirmation))
                <a href="{{ url( 'genre/'.$genre->name.'/edit') }}">edit</a>
                <a href="{{ url( 'genre/'.$genre->name.'/delete') }}">delete</a>
        @endif

    </h1>
    @if(isset($director))
        {{$director-> country}}<br>
        {{ date('Y, F j', strtotime($director->birthdate) )  }}<br><br>
    @endif

    @if(count($movies))
         <table>
             <thead>
                <tr>
                <tr>
                    @include('_partials.heading')
                </tr>
                </tr>
             </thead>
             <tbody>
                @each('_partials.movie', $movies, 'movie')
             </tbody>
             <tfoot>
                <tr>
                    <td colspan="4">$ {{number_format($total_gross,2)}}</td>
                </tr>
             </tfoot>
         </table>

        {{--@if( app('request')->is('/'))--}}
            @include('_partials.pagination')
        {{--@endif--}}

    @else
        <p>No movies :(</p>
    @endif
    @if(isset($confirmation) AND $confirmation !== 'do not show')
        @include('_partials.delete')
    @endif

@endsection
