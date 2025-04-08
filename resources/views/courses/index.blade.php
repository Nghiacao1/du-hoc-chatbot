@extends('layouts.app')

@section('content')
    <h2>Danh sách khóa học</h2>
    <div class="courses">
        @foreach ($courses as $course)
            <div class="course">
                <h3>{{ $course->title }}</h3>
                <p>{{ $course->description }}</p>
                <p>Giá: {{ $course->price }} VNĐ</p>
            </div>
        @endforeach
    </div>
@endsection
