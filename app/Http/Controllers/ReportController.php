<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function dailyMunicipality() {
        return view('reports.daily_municipality');
    }
}
