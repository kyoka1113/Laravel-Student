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
        $students = $studentGrades[0];
    @endphp

    <p>名前: {{ $students ->name }}</p>
    <p>住所: {{ $students ->address }}</p>
    <p>学年: {{ $students ->student_grade ?? '未設定' }}年生</p>

@if ($students ->img_path)
    <img src="{{ asset('storage/' . $students ->img_path) }}" alt="写真">
@endif
    <p>コメント: {{ $students ->comment }}</p>
        <button type="button" onclick="location.href='{{ route('studentedit') }}'">学生編集</button>
    <h3>成績一覧</h3>
@if ($studentGrades->isEmpty())
    <p>成績は登録されていません。</p>
@else
    <table border="1">
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
        @foreach ($studentGrades as $grade)
        <tr>
            <td>{{ $grade->grade }}</td>
            <td>{{ $grade->term == 1 ? '前期' : '後期' }}</td>
            <td>{{ $grade->japanese }}</td>
            <td>{{ $grade->math }}</td>
            <td>{{ $grade->science }}</td>
            <td>{{ $grade->social_studies }}</td>
            <td>{{ $grade->music }}</td>
            <td>{{ $grade->home_economics }}</td>
            <td>{{ $grade->english }}</td>
            <td>{{ $grade->art }}</td>
            <td>{{ $grade->health_and_physical_education }}</td>
        </tr>
        @endforeach
    </table>
@endif

    <button type="button" onclick="location.href='{{ route('editgrades') }}'">成績編集</button>
    <button onclick="location.href='{{ route('grade.create', $studentGrades[0]->id) }}'">成績登録</button>
    <button type="button" onclick="location.href='{{ route('studentview') }}'">戻る</button>

</body>
</html>