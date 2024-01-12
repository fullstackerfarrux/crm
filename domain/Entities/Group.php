<?php

namespace Domain\Entities;

use App\Core\Entity;
use App\Models\Students;
use App\Models\Teachers;
use Domain\Builders\GroupBuilder;

/**
 * Class Group.php
 * @package Domain\Channel\Entities
 *
 * @property int $id
 * @property int $teacher_id
 * @property string $group_stack
 * @property string $group_day
 * @property string $group_time
 * @property string $created_at
 * @property string $updated_at
 *
 * Mixins:
 * @mixin CategoryBuilder
 */

class Group extends Entity
{
    protected $table = "groups";
    protected $fillable = ['group_stack', 'group_day', 'group_time', 'teacher_id'];

    public function newEloquentBuilder($query): GroupBuilder
    {
        return new GroupBuilder($query);
    }

    public function relationTeacher()
    {
        return $this->belongsToMany(Teachers::class);
    }

    public function relationStudent()
    {
        return $this->hasMany(Students::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTeacherId()
    {
        return $this->teacher_id;
    }

    public function getGroupStack()
    {
        return $this->group_stack;
    }

    public function getGroupDay()
    {
        return $this->group_day;
    }

    public function getGroupTime()
    {
        return $this->group_time;
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
