<?php

namespace App\Http\Controllers;

use App\Municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    public function __construct(Municipality $model)
    {
        $this->model = $model;
    }

    public function getAllMunicipalities() {
        if (auth()->user()->role != 'Province') {
            return $this->model->where('recid', auth()->user()->municipality_id)->get();
        } else {
            return $this->model->all();
        }
    }
}
