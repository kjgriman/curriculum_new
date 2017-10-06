<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    //
    protected $table='courses';
    public  $timestamps = false;
    protected $fillable = [
        'id_courses', 'id_category', 'name_courses','description_courses'
    ];
    protected $primaryKey = 'id_courses';
}
