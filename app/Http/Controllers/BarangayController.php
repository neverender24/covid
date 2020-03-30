<?php

namespace App\Http\Controllers;

use App\Barangay;
use Illuminate\Http\Request;

class BarangayController extends Controller
{
    public function __construct(Barangay $model)
    {
        $this->model = $model;
    }

    public function getAllBarangays(Request $request) {
        return $this->model->where('idmun', $request->municipality_id)->get();
    }
}
