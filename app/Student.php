<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'address', 'img_path'];

    public function grades()
    {
    return $this->hasMany(SchoolGrade::class, 'student_id');
    }

}
