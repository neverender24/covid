<?php

namespace App\Http\Controllers;
use App\Tally;
use App\Municipality;
use Illuminate\Http\Request;

class TallyController extends Controller
{
    public function __construct(Tally $model)
    {
        $this->model = $model;
    }

    public function store(Request $request) {
    

        $data = $this->model->create($request->all());

        return redirect('home');
    }

    public function edit($id) {
        $municipalities = Municipality::all();

        $pumToDate = $this->getAllPums() - $this->getAllQuarantines() - $this->getAllReferredPums() - $this->getAllPumDeaths();
        $completedQuarantine = $this->getAllQuarantines();
        $puiInBiu = $this->getAllBrgyPui() - $this->getAllBrgyPuiDischarged() - $this->getAllBrgyPuiReferred() - $this->getAllBrgyPuiDeaths();
        $puiInHospitals = $this->getAllPuiAdmitted() - $this->getAllPuiDeathsNotConfirmed() - $this->getAllPuiRecovered() - $this->getAllBrgyPuiDeaths() - $this->getAllCovidPositive();
        $puiDischarged = $this->getAllBrgyPuiDischarged() + $this->getAllPuiRecovered();
        $puis = $this->getAllBrgyPui() + $this->getAllPuiAdmitted();
        $covidPositive = $this->getAllCovidPositive();
        $covidPositiveDeaths = $this->getAllCovidDeaths();
        $puiDeaths = $this->getAllBrgyPuiDeaths() + $this->getAllPuiDeathsNotConfirmed();
        $pumDeaths = $this->getAllPumDeaths();

        $data = $this->model->findOrFail($id);
        $tallies = $this->model->where('id','!=',0)->paginate(10);
        $action = 'edit';

        return view('home', compact(
            'data',
            'municipalities',
            'completedQuarantine', 
            'pumToDate', 
            'puiInBiu',
            'puiInHospitals',
            'puiDischarged',
            'covidPositive',
            'covidPositiveDeaths',
            'puiDeaths',
            'pumDeaths',
            'puis',
            'tallies',
            'action',
            'id'
        ));
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
