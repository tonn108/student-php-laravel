<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function index(Request $request){
    $students = Student::all();
        return view('welcome', compact('students'));
   }

   public function search(Request $request){
    $search = $request->input('search');
    if(empty($search)) {
            $students = Student::all();
        } else {
            $students = Student::where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('age', 'like', '%' . $search . '%')
                ->orWhere('grade', 'like', '%' . $search . '%')
                ->orWhere('class', 'like', '%' . $search . '%')
                ->get();
        }
    if($students->isEmpty()) {
        return redirect()->back()->with('error', 'ไม่พบข้อมูลที่ค้นหา');
    }
    return view('welcome', compact('students', 'search'));
   }

   public function store(Request $request)
   {
       try {
           $student = new Student;
           $student->first_name = $request->first_name;
           $student->last_name = $request->last_name;
           $student->age = $request->age;
           $student->grade = $request->grade;
           $student->class = $request->class;
           $student->save();

           return redirect('/')->with('success', 'เพิ่มข้อมูลนักเรียนสำเร็จ');
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
       }
   }

   public function destroy($id){
    $student = Student::find($id);
    $student->delete();
    return redirect()->route('student.index');
   }
}