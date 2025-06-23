<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生表示</title>
</head>
<body>
    <h1>学生表示</h1>
    <button type ="button" onclick="location.href='{{route('studentdetail')}}'">学生詳細</button>
    <button type ="button" onclick="location.href='{{ route('home') }}'">back</button>
</html>
