<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $primaryKey = 'recid';

    public function tallies() {
        return $this->hasMany('App\Tally','barangay_id','recid');
    }

    public function municipality() {
        return $this->belongsTo('App\Municipality', 'idmun', 'recid');
    }
}
