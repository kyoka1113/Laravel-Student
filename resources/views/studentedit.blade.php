<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生編集</title>
</head>
<body>
    <form action="{{ route('editstudents.update',$students->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>学年:
            <select name='grade'>
                <option value="1"{{ $students->grade == 1 ? ' selected' : '' }}>1年</option>
                <option value="2"{{ $students->grade == 2 ? ' selected' : '' }}>2年</option>
                <option value="3"{{ $students->grade == 3 ? ' selected' : '' }}>3年</option>
                <option value="4"{{ $students->grade == 4 ? ' selected' : '' }}>4年</option>
            </select>
        <label>名前:<input type="text" name="name" value="{{$students->name}}"></label>
        <br>
        <label>住所:<input type="text" name="address" value="{{$students->address}}"></label>
        <br>
        <label>コメント:<textarea name="comment">{{$students->comment}}</textarea></label>
        <br>
        <label>写真:<input type="file" name="img_path"></label>
        <br>
        <button type="submit">更新</button>
    </form>
    @if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
    <button type="button" onclick="location.href='{{ route('students.show', $students->id) }}'">戻る</button>
</body>
</html>