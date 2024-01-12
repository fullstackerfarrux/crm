<?php

namespace Domain\Builders;

use Illuminate\Database\Eloquent\Builder;

class TeacherBuilder extends Builder
{
    public function whereTeacher($phone): TeacherBuilder
    {
        return $this->where('teacher_phone', '=', $phone);
    }

    public function insertTeacher($params)
    {
        return $this->create([
            'teacher_name' => $params['teacher_name'],
            'teacher_phone' => $params['teacher_phone'],
            'teacher_photo' => $params['teacher_photo'],
        ]);
    }
}
