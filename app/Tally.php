<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tally extends Model
{
    protected $guarded = ['id'];
    protected $primaryKey = 'recid';

    public function barangay() {
        return $this->belongsTo('App\Barangay', 'barangay_id', 'recid');
    }
}
