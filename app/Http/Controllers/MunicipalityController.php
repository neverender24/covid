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
        return $this->model->all();
    }
}
