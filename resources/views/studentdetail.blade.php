<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生詳細</title>
</head>
<body>
    <h2>生徒詳細</h2>
    @php
        $students = $grades[0]; 
    @endphp
    <p>学年: {{ $students->students_grade }}</p>
    <p>名前: {{ $students->name }}</p>
    <p>住所: {{ $students->address }}</p>
    @if($students->img_path)
        <p>写真:</p>
        <img src="{{ asset('storage/'.$students->img_path)}}" alt="Student Photo" style="max-width:200px;">
    @else
        <p>写真: なし</p>
    @endif
    <p>コメント: {{ $students->comment }}</p>
    <button type="button" onclick="location.href='{{ route('editstudents.edit', $students->student_id) }}'">学生情報編集</button>
    <h3>{{ $students->name }}さんの成績</h3>
    @if($grades->isEmpty())
        <p>成績はありません。</p>
    @else
    <table border ="1">
        <tr>
            <th>学年</th>
            <th>学期</th>
            <th>国語</th>
            <th>数学</th>
            <th>理科</th>
            <th>社会</th>
            <th>音楽</th>
            <th>家庭科</th>
            <th>英語</th>
            <th>美術</th>
            <th>保健体育</th>
        </tr>
        @foreach($grades as $grade)
            <tr>
                <td>{{ $grade ->school_grade}}</td>
                <td>{{ $grade ->term == 1 ? '前期' : '後期' }}</td>
                <td>{{ $grade ->japanese }}</td>
                <td>{{ $grade ->math }}</td>
                <td>{{ $grade ->science }}</td>
                <td>{{ $grade ->social_studies }}</td>
                <td>{{ $grade ->music}}</td>
                <td>{{ $grade ->home_economics }}</td>
                <td>{{ $grade ->english}}</td>
                <td>{{ $grade ->art}}</td>
                <td>{{ $grade ->health_and_physical_education }}</td>
            </tr>
        @endforeach
    </table>
    @endif
    <button type="button" onclick="location.href='{{ route('grade.create', $students->student_id) }}'">成績登録</button>
    <button type="button" onclick="location.href='{{ route('editgrades.edit', $students->student_id) }}'">学生情報編集</button>
    <button type="button" onclick="location.href='{{ route('studentview') }}'">戻る</button>
</body>
</html>