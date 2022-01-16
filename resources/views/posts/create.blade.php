@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>投稿ページ</title>
    </head>
    <body>
        <div class="return index">
            <a href="/">戻る</a>
        </div>
        <h1>投稿ページ</h1>
        <div id="app">
            <submit-component></submit-component>
        </div>
    </body>
</html>
@endsection