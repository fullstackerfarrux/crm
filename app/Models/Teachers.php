<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_name', 'teacher_phone', 'teacher_photo'];

    public function group()
    {
        return $this->hasMany(Group::class);
    }
}
