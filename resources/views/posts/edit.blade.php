<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ブログ詳細</title>
    </head>
    <body>
         <div class="return index">
            <a href="/">戻る</a>
        </div>
        <div>
            <h1 class='title'>{{ $post->title }}</h1>
            <p class='body'>{{ $post->body }}</p>
        </div>
        
    </body>
</html>