<?php

namespace Domain\Builders;

use Illuminate\Database\Eloquent\Builder;

class StudentBuilder extends Builder
{

    public function whereId($id): StudentBuilder
    {
        return $this->where('id', '=', $id);
    }
}
