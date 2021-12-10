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
            <mymap-component></mymap-component>
        </div>
        <div>
            @foreach ($own_locations as $location)
                <div style="border: solid 1px black; padding: 16px;">
                <p>{{ $location->id }}</p>
                <p class='body'>緯度：{{ $location->latitude }}，経度：{{ $location->longitude }}</p>
                <p>時刻：{{ $location->created_at }}</p>
                </div>
            @endforeach    
        </div>
    </body>
</html>
@endsection