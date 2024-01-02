<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['group_stack', 'group_day', 'group_time', 'teacher_id'];

    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }

    public function student()
    {
        return $this->hasMany(Students::class);
    }
}
