<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_course extends Model
{
    //
	protected $table='user_course';
    public  $timestamps = false;
    protected $fillable = [
        'id_usercourse', 'id_user', 'id_course','date_asignation'
    ];
}
