<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $stacks = Group::distinct('group_stack')->pluck('group_stack');
        $students = Students::all();

        return view('students')->with(['stacks' => $stacks, 'students' => $students]);
    }

    public function create_store(Request $request)
    {
        $credentials = $request->validate([
            'student_name' => "required",
            'parent_name' => "required",
            'stack' => "required",
            'student_phone' => "required|unique:students,student_phone|regex:/^\+998\d{9}$/",
            'parent_phone' => "required|unique:students,parent_phone|regex:/^\+998\d{9}$/",
        ]);

        Students::create([
            'student_name' => $request->student_name,
            'parent_name' => $request->parent_name,
            'stack' => $request->stack,
            'student_phone' => $request->student_phone,
            'parent_phone' => $request->parent_phone,
        ]);

        return redirect()->route('students_index');
    }

    public function check_time(Request $request)
    {

        $getStack = Students::where('id', $request->id)->first();

        $checkTime = Group::where('group_stack', $getStack->stack)->where('group_time', $request->group_time)
            ->get();

        if (count($checkTime) > 0) {
            $getStack->group_id = $checkTime[0]->id;
            $getStack->save();
            return redirect()->route('students_index');
        }

        $errors = [
            'group_time' => 'Bu vaqtda gruhimiz mavjud emas',
        ];

        return redirect()->back()->withErrors($errors);
    }

    public function remove($id)
    {
        $student = Students::find($id);
        $student->delete();

        return redirect()->route('students_index');
    }
}
