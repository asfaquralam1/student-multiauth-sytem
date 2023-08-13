<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Studentfrom extends Model
{
    //
    protected $table='studentfrom';
    protected $fillable=['name','course','section'];
}
