<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>記事編集</title>
    </head>
    <body>
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="return index">
                <a href="/posts/{{ $post->id }}">戻る</a>
            </div>
            <h1>編集ページ</h1>
            <div>
                <input type="text" name="post[title]" placeholder="記事タイトル" value="{{ $post->title }}"/>
                <p>{{ $errors->first('post.title') }}</p>
            </div>
            <div>
                <textarea name="post[body]" placeholder="本文" value="{{ $post->body }}"/></textarea>
                <p>{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>