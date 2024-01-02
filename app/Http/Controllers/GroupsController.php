<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Teachers;
use Illuminate\Http\Request;

class GroupsController extends Controller
{

    public function index()
    {
        $groups = Group::all();
        return view('groups')->with(['groups' => $groups]);
    }

    public function create_store(Request $request)
    {
        $cerdentails = $request->validate([
            'group_stack' => 'required|string',
            'group_day' => 'required|string',
            'group_time' => 'required|string',
            'teacher_phone' => 'required|unique:teachers,teacher_phone|regex:/^\+998\d{9}$/'
        ]);

        $findTeacher = Teachers::where(['teacher_phone' => $request->teacher_phone])->first();

        if (!$findTeacher) {
            $path = $request->file('teacher_photo')->store('public/photos');
            $resPath = str_replace("public/photos", "photos", $path);

            $create_teacher = Teachers::create([
                'teacher_name' => $request->teacher_name,
                'teacher_phone' => $request->teacher_phone,
                'teacher_photo' => $resPath,
            ]);

            Group::create([
                'group_stack' => $request->group_stack,
                'group_day' => $request->group_day,
                'group_time' => $request->group_time,
                'teacher_id' => $create_teacher->id,
            ]);
        } else {
            Group::create([
                'group_stack' => $request->group_stack,
                'group_day' => $request->group_day,
                'group_time' => $request->group_time,
                'teacher_id' => $findTeacher->id,
            ]);
        }

        return redirect()->route('groups_index');
    }

    public function show($id)
    {
        $group = Group::where('id', $id)->get();
        return view('group')->with(['group' => $group[0]]);
    }
}
