<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    //crud

    // them 
    public function addstudent()
    {
        return view('student.create');
    }


    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function edit($id){
        $student = Student::find($id);
        return view('student.edit', compact('student'));

    }
    public function update(Request $request, $id){
        $student = Student::find($id);
      $student->ten = $request->input('ten');
      $student->ten = $request->input('lop');
      $student->ten = $request->input('email');
      if($request->hasFile('anhdaidien')){
        //
        $anhcu ='uploads/students/'.$student->anhdaidien;
        if(File::exists($anhcu))
        {
            File::delete($anhcu);
        }
        $file = $request->file('anhdaidien');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/students/', $filename);
        $student->anhdaidien = $filename;
     }
     $student->save();
     return redirect()->back()->with('status', 'Cap nhat sinh vien voi anh dai dien thanh cong ');


    }

    public function delete($id){
        $student = Student::find($id);
        $anhdaidien = 'uploads/students/'.$student->anhdaidien;
        if(File::exists($anhdaidien))
        {
            File::delete($anhdaidien);
        }
        $student->delete();
        return redirect()->back()->with('status','Xóa sinh viên và ảnh đại diện thành công');

    }

    public function store(Request $request) {
  $student = new Student;
  $student->ten = $request->input('ten');
  $student->lop = $request->input('lop');
  $student->email = $request->input('email');
 if($request->hasFile('anhdaidien')){
    $file = $request->file('anhdaidien');
    $extension = $file->getClientOriginalExtension();
    $filename = time().'.'.$extension;
    $file->move('uploads/students/', $filename);
    $student->anhdaidien = $filename;
 }
 $student->save();
 return redirect()->back()->with('status', 'Them sinh vien thanh cong ');
        
    }


}
