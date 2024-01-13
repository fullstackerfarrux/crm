<?php

namespace Domain\Builders;

use Illuminate\Database\Eloquent\Builder;

class GroupBuilder extends Builder
{

    public function whereId($id): GroupBuilder
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
}
