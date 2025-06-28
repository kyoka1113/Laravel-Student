<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生表示</title>
</head>
<body>
    <h1>学生表示</h1>
    <form action="{{ route('students.search') }}" method="GET">
        <label for="grade">学年：</label>
        <select name="grade" id="grade">
            <option value="">すべて</option>
            <option value="1" {{ request('grade') == 1 ? 'selected' : '' }}>1年生</option>
            <option value="2" {{ request('grade') == 2 ? 'selected' : '' }}>2年生</option>
            <option value="3" {{ request('grade') == 3 ? 'selected' : '' }}>3年生</option>
            <option value="4" {{ request('grade') == 4 ? 'selected' : '' }}>4年生</option>
        </select>
        <label for="name">名前：</label>
            <input type="text" name="name" id="name" value="{{ request('name') }}" placeholder="名前を入力">

            <button type="submit">検索</button>
    </form>
    <hr>
    <h2>検索結果：</h2>

    @if (isset($students) && $students->isEmpty())
        <p>該当する学生がいません。</p>
    @else
    <ul>
        @foreach ($students as $student)
        <li>
            <a href="{{ route('students.show', $student->id) }}">
            {{ $student->grade }}年生 - {{ $student->name }}</li>
            </a>
        </li>
        @endforeach
    </ul>
@endif
    <button type ="button" onclick="location.href='{{ route('home') }}'">戻る</button>
</body>
</html>
