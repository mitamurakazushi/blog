<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ブログタイトル</title>
    </head>
    <body>
        <h1>ブログタイトル</h1>
        <div>
        @foreach ($posts as $post)
            <h3 class='title'>{{ $post->title }}</h3>
            <p class='body'>{{ $post->body }}</p>
        @endforeach    
        </div>
        <div>
            <h3>記事タイトル1</h3>
            <p>本文1</p>
        </div>
        <div>
            <h3>記事タイトル2</h3>
            <p>本文2</p>
        </div>
        <div>
            <h3>記事タイトル3</h3>
            <p>本文3</p>
        </div>
    </body>
</html>