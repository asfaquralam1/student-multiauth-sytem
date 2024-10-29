<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
    use Notifiable;
    protected $table = 'courses';

    // protected $fillable = ['course_title', 'credit_hour', 'instructor_name', 'students'];

    public function instructor()
    {
        return $this->hasMany(Instructor::class);
    }
    // public function take()
    // {
    //     return $this->hasMany(Take::class);
    // }
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
