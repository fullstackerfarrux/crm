<?php

namespace Domain\Builders;

use Illuminate\Database\Eloquent\Builder;

class TeacherBuilder extends Builder
{
    public function whereTeacherPhone($phone): TeacherBuilder
    {
        return $this->where('teacher_phone', '=', $phone);
    }
}
