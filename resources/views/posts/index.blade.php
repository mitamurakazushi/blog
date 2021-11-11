<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>一覧ページ</title>
    </head>
    <body>
        <h1>一覧ページ</h1>
        [<a href='/posts/create'>作成</a>]
        <div>
            @foreach ($posts as $post)
                <div style="border: solid 1px black; padding: 16px;">
                <a href="/posts/{{ $post->id }}}">{{ $post->title }}</a>
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
        </script>
    </body>
</html>