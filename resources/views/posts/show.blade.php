@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ブログ詳細</title>
    </head>
    <body>
         <div class="return index">
            <a href="/">トップページへ</a>
        </div>
        <div>
            <h1 class='title'>{{ $post->title }}</h1>
            <small>{{ $post->user->name }}</small>
            <h2 class='body'>{{ $post->body }}</h2>
            <p class='category'>category : {{ $post->category }}</p>
            <img src="{{ $post->image }}" />
        </div>
        <div class="return index">
                <a href="/posts/{{ $post->id }}/edit">編集</a>
        </div>
    </body>
</html>
@endsection