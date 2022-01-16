@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <p>{{Auth::user()->name}}</p>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>マップ</title>
    </head>
    <body>
        <h1>マップ</h1>
        <div class="return index">
                <a href="/">トップページへ</a>
        </div>
        <div class="map" id="app">
            <form action="/user/mymap/search" method="GET">
                @csrf
                <label for="category search">カテゴリー検索</label>
                <select name="category">
                    <option value="all">全て</option>
                    <option value="text">メモ</option>
                    <option value="music">音楽</option>
                    <option value="photo">写真</option>
                    </select>
                <input type="submit" value="検索"/>
            </form>
            <mymap-component v-bind:posts="{{$all_posts}}"></mymap-component>
        </div>
    </body>
</html>
@endsection