<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生詳細</title>
</head>
<body>
    <h2>生徒詳細</h2>
        <p>学年: {{ $students->student_grade }}</p>
        <p>名前: {{ $students->name }}</p>
        <p>住所: {{ $students->address }}</p>
    @if($students->img_path)
        <p>写真:</p>
        <img src="{{ asset('storage/'.$students->img_path)}}" alt="Student Photo" style="max-width:200px;">
        @else
        <p>写真: なし</p>
    @endif
        <p>コメント: {{ $students->comment }}</p>
        <button type="button" onclick="location.href='{{ route('editstudents.edit', $students->id) }}'">学生情報編集</button>
        <form action="{{ route('students.delete',$students->id)}}"method='POST' onsubmit="return confirm('本当に削除しますか？');">
            @csrf
            <button type="submit" style="color:red;">学生削除</button>
        </form>
        <h3>{{ $students->name }}さんの成績</h3>
    @if($grades->isEmpty())
        <p>成績はありません。</p>
    @else
    @endif
    <h4>成績検索</h4>
    <form action ="{{ route('grades.search',$students->id)}}"method="GET">
        学年:
        <select name='grade'>
            <option value="">---選択---</option>
            <option value="1"{{ request('grade') == 1 ? ' selected' : '' }}>1年</option>
            <option value="2"{{ request('grade') == 2 ? ' selected' : '' }}>2年</option>
            <option value="3"{{ request('grade') == 3 ? ' selected' : '' }}>3年</option>
            <option value="4"{{ request('grade') == 4 ? ' selected' : '' }}>4年</option>
            <option value="5"{{ request('grade') == 5 ? ' selected' : '' }}>5年</option>
        </select>
        学期:
        <select name="term">
            <option value="">---選択---</option>
            <option value="1"{{ request('term') == 1 ? ' selected' : '' }}>前期</option>
            <option value="2"{{ request('term') == 2 ? ' selected' : '' }}>後期</option>
        </select>
        <button type="submit">検索</button>
        <button type="button"onclick="window.location='{{ route('students.show',$students->id) }}'">リセット</button>
    </form>
    <br>
    <table border="1">
    <tr>
        <th>学年</th><th>学期</th><th>国語</th><th>数学</th><th>理科</th><th>社会</th>
        <th>音楽</th><th>家庭科</th><th>英語</th><th>美術</th><th>保健体育</th><th>操作</th>
    </tr>
    @foreach($grades as $grade)
        <tr>
            <td>{{ $grade->grade_grade }}</td>
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
            <td>
                <button type="button" onclick="location.href='{{ route('editgrades.edit', $grade->grade_id) }}'">編集</button>
            </td>
        </tr>
    @endforeach
</table>
    <button type="button" onclick="location.href='{{ route('grades.create', $students->id) }}'">成績登録</button>
    <button type="button" onclick="location.href='{{ route('studentview') }}'">戻る</button>
</body>
</html>