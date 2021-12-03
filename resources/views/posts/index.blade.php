@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <p>{{Auth::user()->name}}</p>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>一覧ページ</title>
    </head>
    <body>
        <h1>一覧ページ</h1>
        [<a href='/posts/create'>作成</a>]
        [<a href='/user/posts'>自分の投稿一覧</a>]
        [<a href='/user/locations'>自分の位置履歴</a>]
        <div id="app">
            <example-component></example-component>
        </div>
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
            src="{{ mix('js/app.js') }}"
        </script>
    </body>
</html>
@endsection