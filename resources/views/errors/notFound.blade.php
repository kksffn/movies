<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <link rel="stylesheet" href="{{url('css/main.css')}}">

</head>
<body>

    <h1 >{{$heading}}</h1>
    <table>
        <thead>
            <tr>
            <tr>
                <th>{{$explanation}}</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            <td>{{$text}}</td>
        </tbody>
        <tfoot>
            <tr>
                <td><a class="home" href="{{ url('') }}">home</a></td>
            </tr>
        </tfoot>
    </table>


</body>
