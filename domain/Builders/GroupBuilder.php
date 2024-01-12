<?php

namespace Domain\Builders;

use Illuminate\Database\Eloquent\Builder;

class GroupBuilder extends Builder
{

    public function whereGroupId($id): GroupBuilder
    {
        return $this->where('id', '=', $id);
    }

    public function whereGroupStack($stack): GroupBuilder
    {
        return $this->where('group_stack', '=', $stack);
    }

    public function whereGroupTime($time): GroupBuilder
    {
        return $this->where('group_time', '=', $time);
    }

    public function insertGroup($params)
    {
        return $this->create([
            'group_stack' => $params['group_stack'],
            'group_day' => $params['group_day'],
            'group_time' => $params['group_time'],
            'teacher_id' => $params['teacher_id'],
        ]);
    }
}
