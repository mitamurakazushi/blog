@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <p>{{Auth::user()->name}}</p>
        <meta charset="UTF-8">
        <title>自分の位置履歴</title>
    </head>
    <body>
        <div class="return index">
                <a href="/">全体の記事一覧へ</a>
        </div>
        <h1>自分の位置履歴</h1>
        <div>
            @foreach ($own_locations as $location)
                <div style="border: solid 1px black; padding: 16px;">
                <p>{{ $location->id }}</p>
                <p class='body'>{{ $post->latitude }},{{ $location->longitude }}</p>
                </div>
            @endforeach    
        </div>
            <div class='paginate'>
            {{ $own_locations->links() }}
        </div>
    </body>
</html>
@endsection