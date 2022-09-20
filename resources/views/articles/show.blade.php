<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>memo show</title>
</head>
<body>
    <h1>論文詳細</h1>
    <p>タイトル:{{ $article->title }}</p>
    <p>{{!! nl2br(e($article->body)) !!}}</p>
    <a href='/articles'>一覧へ戻る</a>
</body>
</html>
