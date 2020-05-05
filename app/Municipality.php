<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $primaryKey = 'recid';

    public function barangays() {
        return $this->hasMany('App\Barangay','idmun','recid');
    }
}
