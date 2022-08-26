<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>動画一覧</title>
</head>
<body>
    <h1>動画一覧</h1>
    <table border='1'>
        <tr>
            <th>ファイル名</th>
            <th>動画</th>
            <th>URL</th>
            <th>備考</th>
        </tr>
        @foreach ($contents as $content)
            <tr>
                <td>{{$content->name}}</td>
                <td><video src='{{$content->url}}' width='200'></td>
                <td>{{$content->is_free}}</td>
                    {{-- <td>http://localhost/{{$content->filepath}}</td> --}}
            </tr>
        @endforeach
    </table>
</body>
</html>
