<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use \Yajra\Datatables\Datatables;
class StudentController extends Controller
{
    public function index()
    {
        $students = student::paginate();
        return response()->json([
            'data' => $students
        ]);
    }

    public function store(Request $request)
    {
        $students = student::create([
            'npm' => $request->npm,
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'dob' => $request->dob
        ]);
        return response()->json([
            'data' => $students
        ]);
    }
    public function show(Student $student)
    {
        return response() -> json ([
            'data' => $student
        ]);
    }
    public function update(Request $request, Student $student)
    {
        $student->npm = $request->npm;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->username = $request->username;
        $student->phone = $request->phone;
        $student->dob = $request->dob;

        $student->save();
        return response()->json([
            'data' => $student
        ]);
    }
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            'message' => 'student deleted'
        ], 204);
    }
}
