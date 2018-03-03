<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheatreComplex extends Model
{
    protected $table = 'theatre_complexes';

    /**
     * Model relationships
     */

     // theatre_complex has-one theatre_complex_address
     public function theatre_complex_address() {
         return $this->hasOne('App\Models\TheatreComplexAddress');
     }

     // theatre_complex has-many theatres
     public function theatres(){
         return $this->hasMany('App\Models\Theatre');
     }
}