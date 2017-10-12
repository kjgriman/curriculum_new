<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class study extends Model
{
    //
     protected $table='studies';
    public  $timestamps = false;
    protected $fillable = [
        'id_studies', 'id_user', 'type_studies', 'status_studies', 'name_institute', 'career', 'date_in_studies', 'date_out_studies', 'ubication_institute','note_average'
    ];

    protected $primaryKey = 'id_studies';
}
