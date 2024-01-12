<?php

namespace Domain\Entities;

use App\Core\Entity;
use Domain\Builders\StudentBuilder;

/**
 * Class Student.php
 * @package Domain\Channel\Entities
 *
 * @property int $id
 * @property int $group_id
 * @property string $student_name
 * @property string $parent_name
 * @property string $stack
 * @property string $student_phone
 * @property string $parent_phone
 *
 * Mixins:
 * @mixin CategoryBuilder
 */


class Student extends Entity
{
    protected $table = "students";
    protected $fillable = ['student_name', 'parent_name', 'stack', 'student_phone', 'parent_phone'];

    public function newEloquentBuilder($query): StudentBuilder
    {
        return new StudentBuilder($query);
    }

    public function relationGroup()
    {
        return $this->belongsTo(Group::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getGroupId()
    {
        return $this->group_id;
    }

    public function getStudentName()
    {
        return $this->student_name;
    }

    public function getParentName()
    {
        return $this->parent_name;
    }

    public function getStack()
    {
        return $this->stack;
    }

    public function getStudentPhone()
    {
        return $this->student_phone;
    }

    public function getParentPhone()
    {
        return $this->parent_phone;
    }
}
