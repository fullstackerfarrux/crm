<?php

namespace App\Http\Controllers;

use App\Core\ApiItems;
use App\Http\Validations\StudentRequest;
use App\Models\Group;
use App\Models\Students;
use Domain\Entities\Group as EntitiesGroup;
use Domain\Entities\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    private Student $student;
    private EntitiesGroup $group;

    public function __construct(Student $student, EntitiesGroup $group)
    {
        $this->student = $student;
        $this->group = $group;
    }

    public function index()
    {
        $stacks = Group::distinct('group_stack')->pluck('group_stack');
        $students = Students::all();

        return view('students')->with(['stacks' => $stacks, 'students' => $students]);
    }

    public function create_store(StudentRequest $request)
    {
        $request->validated();

        $this->student->insertStudent([
            ApiItems::STUDENT_NAME->value => $request->student_name,
            ApiItems::PARENT_NAME->value => $request->parent_name,
            ApiItems::STACK->value => $request->stack,
            ApiItems::STUDENT_PHONE->value => $request->student_phone,
            ApiItems::PARENT_PHONE->value => $request->parent_phone,
        ]);

        return redirect()->route('students_index');
    }

    public function check_time(Request $request)
    {

        $getStack = $this->student
            ->whereStudentId($request->id)
            ->first();

        $checkTime = $this->group
            ->whereGroupStack('group_stack', $getStack->stack)
            ->whereGroupTime('group_time', $request->group_time)
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
        $student = $this->student
            ->whereStudentId($id)
            ->first();

        $student->delete();

        return redirect()->route('students_index');
    }
}
