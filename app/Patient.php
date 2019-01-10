<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //Table name
    protected $table = 'patients';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

}
