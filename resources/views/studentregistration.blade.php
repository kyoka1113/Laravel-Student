<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生登録</title>
</head>
<body>
    <h1>学生登録</h1>
<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="addres">住所:</label>
        <input type="text" id="addres" name="addres" required>
        <br>
        <button type="submit">登録</button>
    </form>
<button type ="button" onclick="location.href='{{ route('home') }}'">戻る</button>
</body>
</html>