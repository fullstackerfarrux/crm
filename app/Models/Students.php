<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = ['student_name', 'parent_name', 'stack', 'student_phone', 'parent_phone'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
