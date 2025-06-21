@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    こんにちは、さん
                    <br>
                    現在の学年：年
                    <br>
                    <form action="{{ route('students.gradeUp') }}" method="POST">
                    @csrf
                    <button type="submit">学年更新</button>
                    </form>
                    <br>
                    <button type="button" onclick="location.href='{{ route('studentregistration') }}'">学生登録</button>
                    <button type="button" onclick="location.href='{{ route('studentview') }}'">学生表示</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
