@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <p>{{Auth::user()->name}}</p>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>位置履歴マップ</title>
    </head>
    <body>
        <h1>位置履歴マップ</h1>
        <div class="return index">
                <a href="/">トップページへ</a>
        </div>
        <div id="app">
            <mymap-component v-bind:locations="{{$own_locations}}"></mymap-component>
        </div>
    </body>
</html>
@endsection