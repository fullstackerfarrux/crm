<?php

namespace Domain\Entities;

use App\Core\Entity;
use App\Models\Group;
use Domain\Builders\TeacherBuilder;

/**
 * Class Teacher.php
 * @package Domain\Channel\Entities
 *
 * @property int $id
 * @property string $teacher_name
 * @property string $teacher_phone
 * @property string $teacher_photo
 * @property string $created_at
 * @property string $updated_at
 *
 * Mixins:
 * @mixin CategoryBuilder
 */

class Teacher extends Entity
{
    protected $table = "teachers";
    protected $guarded = [];

    public function newEloquentBuilder($query)
    {
        return new TeacherBuilder($query);
    }

    public function relationGroup()
    {
        return $this->hasMany(Group::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTeacherName()
    {
        return $this->teacher_name;
    }

    public function getTeacherPhone()
    {
        return $this->teacher_phone;
    }

    public function getTeacherPhoto()
    {
        return $this->teacher_photo;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }
}
