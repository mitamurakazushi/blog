@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <p>{{Auth::user()->name}}</p>
        <meta charset="UTF-8">
        <title>自分の投稿一覧</title>
    </head>
    <body>
        <div class="return index">
                <a href="/">トップページへ</a>
        </div>
        <h1>自分の投稿一覧</h1>
        <div>
            @foreach ($own_posts as $post)
                <div style="border: solid 1px black; padding: 16px;">
                <a href="/posts/{{ $post->id }}" style="font-size: 20pt";>{{ $post->title }}</a>
                <div>
                </div>
                <h2 class='body'>{{ $post->body }}</h2>
                <p class='category'>category : {{ $post->category }}</p>
                <p class='iconurl'>iconurl : {{ $post->image }}</p>
                <img src="{{ $post->image }}" />
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
            {{ $own_posts->links() }}
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