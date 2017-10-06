<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='category';
    public  $timestamps = false;
    protected $fillable = [
        'id_category', 'name_category', 'description_category'
    ];
    protected $primaryKey = 'id_category';

}
