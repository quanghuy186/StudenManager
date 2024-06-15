<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRequest;
use App\Models\Classe;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::all();
        $students = Student::orderBy('created_at', 'desc')->paginate(8);
        return view('index', compact('students', 'classes'));
    }

   
    public function create()
    {
        $classes = Classe::all();
        return view('add', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateRequest $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'parent_phone' => 'required',
            'class_id' => 'required|integer',
        ]);
        
        $student = Student::create($validatedData);
        Session::flash('add_success', 'Thêm mới thành công!');
        return redirect()->route('students.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $classes  = Classe::all();
        $student = Student::find($id);
        return view('detail', compact('student', 'classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classes  = Classe::all();
        $student = Student::find($id);
        return view('edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'parent_phone' => 'required',
            'class_id' => 'required|integer',
        ]);

        $student->update($validatedData);
        Session::flash('edit_success', 'Dữ liệu đã được thay đổi!');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        Session::flash('delete_success', 'Dữ liệu đã được xóa!');
        return redirect()->route('students.index');
    }
}