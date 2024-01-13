<?php

namespace App\Http\Controllers;

use App\Core\ApiItems;
use Domain\Entities\Group;
use Domain\Entities\Teacher;
use App\Http\Validations\GroupRequest;
use Domain\Services\GroupService;
use Domain\Services\TeacherService;

class GroupsController extends Controller
{
    private Group $group;
    private Teacher $teacher;
    private GroupService $group_service;
    private TeacherService $teacher_service;

    public function __construct(Group $group, Teacher $teacher, GroupService $group_service, TeacherService $teacher_service)
    {
        $this->group = $group;
        $this->teacher = $teacher;
        $this->group_service = $group_service;
        $this->teacher_service = $teacher_service;
    }

    public function index()
    {
        $groups = Group::all();
        return view('groups')->with(['groups' => $groups]);
    }

    public function create_store(GroupRequest $request)
    {
        $request->validated();

        $findTeacher = $this->teacher->whereTeacherPhone($request->teacher_phone)->get();

        if ($findTeacher->count() == 0) {
            $path = $request->file('teacher_photo')->store('public/photos');
            $resPath = str_replace("public/photos", "photos", $path);


            $create_teacher = $this->teacher_service->create([
                ApiItems::TEACHER_NAME->value => $request->teacher_name,
                ApiItems::TEACHER_PHONE->value => $request->teacher_phone,
                ApiItems::TEACHER_PHOTO->value => $resPath,
            ]);

            $this->group_service->create([
                ApiItems::GROUP_STACK->value => $request->group_stack,
                ApiItems::GROUP_DAY->value => $request->group_day,
                ApiItems::GROUP_TIME->value => $request->group_time,
                ApiItems::TEACHER_ID->value => $create_teacher->id,
            ]);
        } else {
            $this->group_service->create([
                ApiItems::GROUP_STACK->value => $request->group_stack,
                ApiItems::GROUP_DAY->value => $request->group_day,
                ApiItems::GROUP_TIME->value => $request->group_time,
                ApiItems::TEACHER_ID->value => $findTeacher[0]->id,
            ]);
        }

        return redirect()->route('groups_index');
    }

    public function show($id)
    {
        $group = $this->group->whereId($id)->get();
        return view('group')->with(['group' => $group[0]]);
    }
}
