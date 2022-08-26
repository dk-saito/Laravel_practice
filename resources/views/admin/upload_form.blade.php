<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>動画アップロードフォーム</title>

</head>
<body>
    <h1>動画アップロードフォーム</h1>
    <form action="" method="POST" enctype="multipart/form-data">

        <div>
            <label for="content">
                <p>アップロード動画</p>
                <input id="content" type="file" name="content">
            </label>
        </div>

        <div>
            <p>
                <input type="submit" value="アップロードする">
            </p>
        </div>

        @csrf
    </form>
</body>
</html>
