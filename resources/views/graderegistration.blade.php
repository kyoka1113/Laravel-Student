    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>成績登録</title>
    </head>
    <body>
    <h1>成績登録</h1>
    <form action="{{ route('grade.store',$students->id) }}" method="POST">
        @csrf
        <input type="hidden" name="redirect_to" value="{{ route('students.show',$students->id) }}">
        <label for='grade'>学年：</label>
        <select name="grade" id="grade" required>
            <option value="">選択してください</option>
            <option value="1">1年生</option>
            <option value="2">2年生</option>
            <option value="3">3年生</option>
            <option value="4">4年生</option>
        </select>
        <br>
        <label for='term'>学期：</label>
        <select name="term" id="term" required>
            <option value="">選択してください</option>
            <option value="1">前期</option>
            <option value="2">後期</option>
        </select>
        <br>
        <label for="japanese">国語：</label>
        <select name="japanese" id="japanese">
            @for ($i = 1; $i <= 100; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <br>
        <label for="math">数学：</label>
        <select name="math" id="math">
            @for ($i = 1; $i <= 100; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <br>
        <label for="science">理科：</label>
        <select name="science" id="science">
            @for ($i = 1; $i <= 100; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <br>
        <label for="social_studies">社会：</label>
        <select name="social_studies" id="social_studies">
            @for ($i = 1; $i <= 100; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
            <br>
            <label for="music">音楽：</label>
        <select name="music" id="music">
            @for ($i = 1; $i <= 100; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <br>
        <label for="home_economics">家庭科：</label>
        <select name="home_economics" id="home_economics">
            @for ($i = 1; $i <= 100; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <br>
        <label for="english">英語：</label>
        <select name="english" id="english">
            @for ($i = 1; $i <= 100; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <br>
        <label for="art">美術：</label>
        <select name="art" id="art">
            @for ($i = 1; $i <= 100; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <br>
        <label for="health_and_physical_education">保健体育：</label>
        <select name="health_and_physical_education" id="health_and_physical_education">
            @for ($i = 1; $i <= 100; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <br>
        <button type="submit">登録</button>
        </form>
            @if (session('success'))
            <p style="color:green;">{{ session('success') }}</p>
            @endif

            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color:red;">{{ $error }}</p>
            @endforeach
            @endif
        <button type="button" onclick="location.href='{{ route('students.show', $students->id) }}'">戻る</button>
    </body>
    </html>