@extends('layouts.header')

@section('main')
<body>
    <h1 class="text-center mt-3">Thêm mới học sinh</h1>
    <form method="POST" action="{{ route('students.store') }}" class="mt-5 container rounded-3 shadow p-4">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">Tên</label>
            <input value="{{ old('first_name') }}" type="text" name="first_name" id="title" class="form-control" placeholder="Nhập tên">
        </div>
        @if ($errors->has('first_name'))
		    <div class="text-danger alert alert-danger">{{ $errors->first('first_name') }}</div>
		@endif									
    
        <div class="mb-3">
            <label for="last_name" class="form-label">Họ</label>
            <input value="{{ old('last_name') }}" type="text" name="last_name" id="last_name" class="form-control" placeholder="Nhập họ">
        </div>
        @if ($errors->has('last_name'))
            <div class="text-danger alert alert-danger">{{ $errors->first('last_name') }}</div>
        @endif	

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Ngày tháng năm sinh</label>
            <input  value="{{ old('date_of_birth') }}" type="text" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Nhập ngày tháng năm sinh">
        </div>
        @if ($errors->has('date_of_birth'))
            <div class="text-danger alert alert-danger">{{ $errors->first('date_of_birth') }}</div>
        @endif

        <div class="mb-3">
            <label for="parent_phone" class="form-label">Số điện thoại bố mẹ</label>
            <input   value="{{ old('parent_phone') }}" type="text" name="parent_phone" id="parent_phone" class="form-control" placeholder="Nhập số điện thoại bố mẹ">
        </div> 
        @if ($errors->has('parent_phone'))
            <div class="text-danger alert alert-danger">{{ $errors->first('parent_phone') }}</div>
        @endif
       
        {{-- <label for="">Cấp lớp</label> --}}
        <div class="form-group">
            <label for="parent_phone" class="form-label">Cấp học - phòng học</label>
            <select class="form-control" name="class_id" id="class_id">
                @foreach ($classes as $item)
                    <option value="{{ $item->id }}">{{ $item->grade_level }} - {{ $item->room_number }}</option>
                @endforeach
            </select>   
        </div>
        {{-- <div class="form-group">
            <select class="form-control" name="class_id" id="class_id">
                @foreach ($classes as $item)
                    <option value="{{ $item->id }}">{{ $item->grade_level }} . {{ $item->room_number }}</option>
                @endforeach
            </select>   
        </div> --}}

        {{-- <label class="mt-3" for="">Phòng học số</label>
        <div class="form-group">
            <select class="form-control" name="class_id" id="class_id">
                @foreach ($classes as $item)
                    <option value="{{ $item->id }}">{{ $item->room_number }}</option>
                @endforeach
            </select>   
        </div> --}}
        <button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
        <a class="btn btn-warning mt-3 text-white" href="{{ route('students.index') }}">Quay lại</a>
    </form>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>
@endsection