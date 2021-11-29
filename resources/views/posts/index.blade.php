@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <p>{{Auth::user()->name}}</p>
        <meta charset="UTF-8">
        <title>一覧ページ</title>
    </head>
    <body>
        <h1>一覧ページ</h1>
        [<a href='/posts/create'>作成</a>]
        [<a href='/user/posts'>自分の投稿一覧</a>]
        [<a href='/user/locations'>自分の位置履歴</a>]
        <form action="/locations" method="POST">
                    @csrf
                    <button type="button" onclick="loc()">位置情報取得</button>
        </form>
        <div>
            @foreach ($posts as $post)
                <div style="border: solid 1px black; padding: 16px;">
                <a href="/posts/{{ $post->id }}}">{{ $post->title }}</a>
                <div>
                <small>{{ $post->user->name }}</small>
                </div>
                <p class='body'>{{ $post->body }}</p>
                <form action="/posts/{{ $post->id }}" id="delete_form" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="del()">削除</button>
                </form>
                <p></p>
                </div>
            @endforeach    
        </div>
            <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
            function del(){
                'use strict';
                if (confirm("削除しますか？")){
                document.getElementById("delete_form").submit();
                }
            }
            function loc() {
                navigator.geolocation.getCurrentPosition(loc2);
            }
            function loc2(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                console.log(lon);
            }
        </script>
    </body>
</html>
@endsection