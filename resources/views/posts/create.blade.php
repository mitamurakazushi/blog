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
                <a href="/">一覧へ</a>
            </div>
            <div>
                <input type="text" name="post[title]" placeholder="記事タイトル">
            </div>
            <div>
                <textarea name="post[body]" placeholder="本文"></textarea>
            </div>
            <input type="submit" value="保存"/>
    </body>
</html>