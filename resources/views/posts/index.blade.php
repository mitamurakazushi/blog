<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>一覧ページ</title>
    </head>
    <body>
        <h1>一覧ページ</h1>
        [<a href='/posts/create'>create</a>]
        <div>
            @foreach ($posts as $post)
                <a href="/posts/{{ $post->id }}}">{{ $post->title }}</a>
                <p class='body'>{{ $post->body }}</p>
            @endforeach    
        </div>
            <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>