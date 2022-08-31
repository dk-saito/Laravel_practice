<!DOCTYPE html>
<html lang="ja">
<head>
    <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">U-next</h2>
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
