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
    public function __construct(Tally $model)
    {
        $this->middleware('auth');
        $this->model = $model;
    }

    public function getUserRole() {
        return auth()->user()->role;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getAllPums() {
        return $this->model->sum('brgy_pum');
    }

    public function getAllQuarantines() {
        return $this->model->sum('brgy_completed_quarantine');
    }

    public function getAllReferredPums() {
        return $this->model->sum('brgy_referred_pui');
    }

    public function getAllPumDeaths() {
        return $this->model->sum('brgy_pum_death');
    }

    public function getAllBrgyPui() {
        return $this->model->sum('pui_brgy');
    }

    public function getAllBrgyPuiDischarged() {
        return $this->model->sum('pui_brgy_discharged');
    }

    public function getAllBrgyPuiReferred() {
        return $this->model->sum('pui_brgy_referred');
    }

    public function getAllBrgyPuiDeaths() {
        return $this->model->sum('pui_brgy_deaths');
    }

    public function getAllPuiAdmitted() {
        return $this->model->sum('pui_admitted');
    }

    public function getAllPuiDeathsNotConfirmed() {
        return $this->model->sum('pui_deaths_nc');
    }

    public function getAllPuiNegative() {
        return $this->model->sum('pui_negative');
    }

    public function getAllPuiRecovered() {
        return $this->model->sum('pui_recovered');
    }

    public function getAllPuiDeathsNegative() {
        return $this->model->sum('pui_deaths_n');
    }

    public function getAllCovidPositive() {
        return $this->model->sum('covid_positive');
    }

    public function getAllCovidDeaths() {
        return $this->model->sum('covid_deaths');
    }

    public function getAllCovidDischarged() {
        return $this->model->sum('covid_dischareged');
    }
}
