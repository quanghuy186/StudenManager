@extends('layouts.header')

@section('main')
<body>
    <h1 class="text-center mt-3">Chỉnh sửa thông tin học sinh</h1>
    <form method="POST" action="{{ route('students.update', $student) }}" class="mt-5 container rounded-3 shadow p-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="first_name" class="form-label">Tên</label>
            <input value="{{ $student->first_name }}" type="text" name="first_name" id="title" class="form-control" placeholder="Enter tên">
        </div>
        @if ($errors->has('first_name'))
		    <div class="text-danger alert alert-danger">{{ $errors->first('first_name') }}</div>
		@endif									
    
        <div class="mb-3">
            <label for="last_name" class="form-label">Họ</label>
            <input value="{{ $student->last_name }}" type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter last_name">
        </div>
        @if ($errors->has('last_name'))
            <div class="text-danger alert alert-danger">{{ $errors->first('last_name') }}</div>
        @endif	

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Ngày tháng năm sinh(Năm-tháng-ngày)</label>
            <input value="{{ $student->date_of_birth }}" type="text" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Enter date_of_birth">
        </div>
        @if ($errors->has('date_of_birth'))
            <div class="text-danger alert alert-danger">{{ $errors->first('date_of_birth') }}</div>
        @endif

        <div class="mb-3">
            <label for="parent_phone" class="form-label">Số điện thoại bố mẹ</label>
            <input value="{{ $student->parent_phone }}" type="text" name="parent_phone" id="parent_phone" class="form-control" placeholder="Enter Pulication Year">
        </div> 
        @if ($errors->has('parent_phone'))
            <div class="text-danger alert alert-danger">{{ $errors->first('parent_phone') }}</div>
        @endif

        <div class="form-group">
            <label class="form-label">Cấp học - phòng học</label>
            <select class="form-control" name="class_id" id="class_id">
                @foreach ($classes as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $student->class_id ? 'selected' : '' }}>
                        {{ $item->grade_level }} - {{ $item->room_number }}
                    </option>
                @endforeach
            </select>   
        </
        
        </div>

        <button type="submit" class="btn btn-primary mt-3">Lưu lại</button>

        <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{$student->id}}">
            Hủy
        </button>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="exampleModalLabel">Xác nhận hủy</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có muốn hủy không
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <a class="btn btn-warning" href="{{ route('students.index') }}">Hủy</a>
                    </div>
                </div>
            </div>
        </div>

    </form>
</body>
@endsection
