<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //Table name
    protected $table = 'doctors';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

}
