<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                <td>
                    {{-- <form action=""> --}}
                    {{-- <input type="hidden" name="is_free" value="{{$content->is_free}}"> --}}
                @if($content->is_free == 1)
                <p>無料</p>
                @else
                <p>有料</p>
                @endif
                {{-- @csrf
            </form> --}}
                </td>
                {{-- <td>http://localhost/{{$content->filepath}}</td> --}}
            </tr>
        @endforeach
    </table>
</body>
</html>
