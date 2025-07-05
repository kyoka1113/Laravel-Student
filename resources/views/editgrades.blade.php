<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>成績編集</title>
</head>
<body>
<h1>成績編集</h1>
    <form action="{{ route('editgrades.update',$grades->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>学年：
        <select name="grade">
            <option value="1"{{ $grades->grade == 1 ? 'selected' : ''}}>1年生</option>
            <option value="2"{{ $grades->grade == 2 ? 'selected' : ''}}>2年生</option>
            <option value="3"{{ $grades->grade == 3 ? 'selected' : ''}}>3年生</option>
            <option value="4"{{ $grades->grade == 4 ? 'selected' : ''}}>4年生</option>
        </select>
        </label>
        <br>
        <label>学期：
        <select name='term'>
            <option value="1"{{ $grades->term == 1 ? 'selected' : ''}}>前期</option>
            <option value="2"{{ $grades->term == 2 ? 'selected' : ''}}>後期</option>
        </select>
        </label>
        <br>
        <label>国語：</label>
    <select name="japanese">
        @for ($i = 0; $i <= 100; $i++)
            <option value="{{ $i }}" {{ $grades->japanese == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
    <br>
    <label>数学：</label>
    <select name="math">
        @for ($i = 0; $i <= 100; $i++)
            <option value="{{ $i }}" {{ $grades->math == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
    <br>
    <label>理科：</label>
    <select name="science">
        @for ($i = 0; $i <= 100; $i++)
            <option value="{{ $i }}" {{ $grades->science == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
    <br>
    <label>社会：</label>
    <select name="social_studies">
        @for ($i = 0; $i <= 100; $i++)
            <option value="{{ $i }}" {{ $grades->social_studies == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
    <br>
    <label>音楽：</label>
    <select name="music">
        @for ($i = 0; $i <= 100; $i++)
            <option value="{{ $i }}" {{ $grades->music == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
    <br>
    <label>家庭科：</label>
    <select name="home_economics">
        @for ($i = 0; $i <= 100; $i++)
            <option value="{{ $i }}" {{ $grades->home_economics == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
    <br>
    <label>英語：</label>
    <select name="english">
        @for ($i = 0; $i <= 100; $i++)
            <option value="{{ $i }}" {{ $grades->english == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
    <br>
    <label>美術：</label>
    <select name="art">
        @for ($i = 0; $i <= 100; $i++)
            <option value="{{ $i }}" {{ $grades->art == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
    <br>
    <label>保健体育：</label>
    <select name="health_and_physical_education">
        @for ($i = 0; $i <= 100; $i++)
            <option value="{{ $i }}" {{ $grades->health_and_physical_education == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
    <br>
        <button type="submit">更新する</button>
    </form>
    @if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
    @endif
<button type="button" onclick="location.href='{{ route('students.show', $grades->student_id) }}'">戻る</button>
</body>
</html>