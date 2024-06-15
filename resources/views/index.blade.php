@extends('layouts.master')  
@section('content')
            @if(Session::has('add_success'))
            <div class="alert alert-success">
                {{ Session::get('add_success') }}
            </div>
            @endif

            @if(Session::has('delete_success'))
            <div class="alert alert-success">
                {{ Session::get('delete_success') }}
            </div>
            @endif

            @if(Session::has('edit_success'))
            <div class="alert alert-success">
                {{ Session::get('edit_success') }}
            </div>
            @endif
            
            @if(Session::has('login_success'))
            <div class="alert alert-success">
                {{ Session::get('login_success') }}
            </div>
            @endif
           <div class="content">
           
                <a class="btn btn-success" href="{{ route('students.create') }}">Thêm mới học sinh</a>   
                {{-- <a class="btn btn-success" href="{{ route('bookings.create') }}">BOOKING</a>    --}}
                <table class="table table-hover my-0">
                    <thead class="text-center">
                        <tr >
                            <th class="d-none d-xl-table-cell">Mã học sinh</th>
                            <th class="d-none d-xl-table-cell">Họ và tên</th>
                            <th class="d-none d-xl-table-cell">Ngày sinh</th>
                            <th class="d-none d-md-table-cell">Số điện thoại phụ huynh</th>
                            <th class="d-none d-md-table-cell">Cấp lớp</th>
                            <th class="d-none d-md-table-cell">Phòng học</th>
                            <th>
                                <div class="modal" tabindex="-1">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Modal title</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Modal body text goes here.</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </th>
                        </tr>
                    </thead>
                  
                    <tbody class="text-center">
                        @foreach ($students as $student)
                            <tr>
                                <td class="d-none d-xl-table-cell">{{ $student->id }}</td>
                                <td class="d-none d-xl-table-cell"> {{ $student->last_name }} {{ $student->first_name }}
                                </td>
                                <td class="d-none d-xl-table-cell">{{ $student->date_of_birth }}</td>
                                <td class="d-none d-xl-table-cell">{{ $student->parent_phone }}</td>
                                <td class="d-none d-xl-table-cell">{{ $student->classes->grade_level }}</td>
                                <td class="d-none d-xl-table-cell">{{ $student->classes->room_number }}</td>
                                <td class="d-none d-xl-table-cell">
                                    <a class="btn btn btn-primary" href="{{ route('students.edit', $student) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </a>
                                    
                                    <a class="btn btn-warning" href="{{ route('students.show', $student) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off align-middle me-2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                    </a>

                                    <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#deleteModal{{$student->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 align-middle me-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>

                                    <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fs-5" id="exampleModalLabel">Xác nhận xóa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                               Bạn có chắc chắn muốn xóa không?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $students->links() }}
                </div>
            </div>
@endsection



			