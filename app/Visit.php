<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    //Table name
    protected $table = 'visits';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
      return $this->belongsTo('App\User');
    }
}
