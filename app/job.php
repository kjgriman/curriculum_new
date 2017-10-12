<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    //

     protected $table='jobs';
    public  $timestamps = false;
    protected $fillable = [
        'id_jobs', 'id_user', 'name_company', 'cargo', 'date_in', 'date_out', 'ubication_company', 'observation', 'actuality'
    ];

    protected $primaryKey = 'id_jobs';
    // protected $primaryKey = 'id_jobs';
}
