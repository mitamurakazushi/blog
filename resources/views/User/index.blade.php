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
                <a href="/">全体の記事一覧へ</a>
        </div>
        <h1>自分の投稿一覧</h1>
        <div>
            @foreach ($own_posts as $post)
                <div style="border: solid 1px black; padding: 16px;">
                <a href="/posts/{{ $post->id }}}">{{ $post->title }}</a>
                <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach    
        </div>
            <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
    </body>
</html>
@endsection