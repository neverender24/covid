<?php

namespace App\Http\Controllers;

use App\Tally;
use App\Municipality;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $municipalities = Municipality::all();

        $count_pui = Tally::sum('pui_mlgu');
        $count_pum = Tally::sum('pum');
        $count_confirmed = Tally::sum('confirmed');
        $count_death = Tally::sum('death');
        $count_recovered = Tally::sum('recovered');

        $as_of = Tally::orderBy('id','DESC')->first();

        return view('home', compact('count_pui','count_pum','count_confirmed','count_death','count_recovered', 'as_of', 'municipalities'));
    }
}
