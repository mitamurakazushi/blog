@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>新規記事作成</title>
    </head>
    <body>
        <form action="/posts" method="POST">
            @csrf
            <div class="return index">
                <a href="/">戻る</a>
            </div>
            <h1>作成ページ</h1>
            <div>
                <input type="text" name="post[title]" placeholder="記事タイトル" value="{{ old('post.title') }}"/>
                <p>{{ $errors->first('post.title') }}</p>
            </div>
            <div>
                <textarea name="post[body]" placeholder="本文" value="{{ old('post.body') }}"/></textarea>
                <p>{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>
@endsection