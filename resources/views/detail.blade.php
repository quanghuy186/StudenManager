@extends('layouts.header')

@section('main')
<body>
    <div class="container">
        <h1 class="text-center mt-3">Xem chi tiết</h1>

        <div class="card mt-3">
            <div class="card-body">
                <p class="card-text"><strong>Mã học sinh:</strong> {{ $student->id }}</p>
                <p class="card-text"><strong>Tên:</strong> {{ $student->first_name }}</p>
                <p class="card-text"><strong>Họ:</strong> {{ $student->last_name }}  </p>
                <p class="card-text"><strong>Ngày tháng năm sinh:</strong> {{ $student->date_of_birth }}</p>
                <p class="card-text"><strong>Số điện thoại bố mẹ:</strong> {{ $student->parent_phone }}</p>
                <hr>
                <p class="card-text"><strong>Cấp học:</strong> {{ $student->classes->grade_level }}</p>
                <p class="card-text"><strong>Phòng học:</strong> {{ $student->classes->room_number }}</p>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <a href="{{ route('students.index') }}" class="btn btn-primary">Quay lại trang chủ</a>
        </div>
    </div>
</body>
@endsection