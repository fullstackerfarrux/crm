<?php

namespace App\Http\Controllers;

use App\Core\ApiItems;
use Domain\Entities\Group;
use Domain\Entities\Teacher;
use App\Http\Validations\GroupRequest;


class GroupsController extends Controller
{
    private Group $group;
    private Teacher $teacher;

    public function __construct(Group $group, Teacher $teacher)
    {
        $this->group = $group;
        $this->teacher = $teacher;
    }

    public function index()
    {
        $groups = Group::all();
        return view('groups')->with(['groups' => $groups]);
    }

    public function create_store(GroupRequest $request)
    {
        $request->validated();

        $findTeacher = $this->teacher->whereTeacher($request->teacher_phone)->get();

        if ($findTeacher->count() == 0) {
            $path = $request->file('teacher_photo')->store('public/photos');
            $resPath = str_replace("public/photos", "photos", $path);


            $create_teacher = $this->teacher->insertTeacher([
                ApiItems::TEACHER_NAME->value => $request->teacher_name,
                ApiItems::TEACHER_PHONE->value => $request->teacher_phone,
                ApiItems::TEACHER_PHOTO->value => $resPath,
            ]);

            $this->group->insertGroup([
                ApiItems::GROUP_STACK->value => $request->group_stack,
                ApiItems::GROUP_DAY->value => $request->group_day,
                ApiItems::GROUP_TIME->value => $request->group_time,
                ApiItems::TEACHER_ID->value => $create_teacher->id,
            ]);
        } else {
            $this->group->insertGroup([
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
        $group = $this->group->whereGroupId($id)->get();
        return view('group')->with(['group' => $group[0]]);
    }
}
