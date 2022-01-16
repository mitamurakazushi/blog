@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <p>{{Auth::user()->name}}</p>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>トップページ</title>
    </head>
    <body>
        <p>{{ config('app.gmapkey') }}</p>
        <h1>トップページ</h1>
        <div>
        [<a href='/posts/create' style="font-size: 30pt";>投稿</a>]
        </div>
        <div>
        [<a href='/user/posts' style="font-size: 30pt";>投稿一覧</a>]
        </div>
        <!--
        [<a href='/user/locations'>自分の位置履歴</a>]
        -->
        <div>
        [<a href='/user/mymap' style="font-size: 30pt";>マップ</a>]
        </div>
    </body>
</html>
@endsection