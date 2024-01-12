<?php

namespace Domain\Builders;

use Illuminate\Database\Eloquent\Builder;

class StudentBuilder extends Builder
{

    public function whereStudentId($id): StudentBuilder
    {
        return $this->where('id', '=', $id);
    }

    public function insertStudent($params)
    {
        return $this->create([
            'student_name' => $params['student_name'],
            'parent_name' => $params['parent_name'],
            'stack' => $params['stack'],
            'student_phone' => $params['student_phone'],
            'parent_phone' => $params['parent_phone'],
        ]);
    }
}
