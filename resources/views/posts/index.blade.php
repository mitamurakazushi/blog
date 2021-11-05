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
            <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>