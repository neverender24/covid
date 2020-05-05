<?php

namespace App\Http\Controllers;
use App\Tally;
use App\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TallyController extends Controller
{
    public function __construct(Tally $model)
    {
        $this->model = $model;
    }

    public function index(Request $request) {
        $sortFields     = ['created_at'];
		$length         = $request->length;
		$column         = $request->column;
		$dir            = $request->dir;
        $municipality_id   = $request->municipality_id;
        $barangay_id   = $request->barangay_id;
        $date_updated   = $request->date_updated;

        $index = $this->model->with(['barangay' => function($q){
            return $q->with(['municipality'])->get();
        }])->orderBy($sortFields[$column], $dir);

        if (auth()->user()->role != 'Province') {
            $index= $index->where('municipality_id', auth()->user()->municipality_id);
        }

        $this->searchMunicipality($index, $municipality_id);
        $this->searchBarangay($index, $barangay_id);
        $this->searchDate($index, $date_updated);

        $index = $index->paginate($length);

    	return ['data'=>$index, 'draw'=> $request->draw];
    }

    public function searchMunicipality($collection, $searchValue) {
        if ($searchValue) {
            return $collection->where('municipality_id', $searchValue);
        }
    }

    public function searchBarangay($collection, $searchValue) {
        if ($searchValue) {
            return $collection->where('barangay_id',$searchValue);
        }
    }

    public function searchDate($collection, $searchValue) {
        if ($searchValue) {
            return $collection->where('date_updated',$searchValue);
        }
    }

    public function store(Request $request) {
        $totalPum = $this->model
                        ->where('municipality_id', $request->municipality_id)
                        ->where('barangay_id', $request->barangay_id)
                        ->sum(DB::raw('pum_brgy-pum_brgy_completed_quarantine-pui_ref'));

        $totalPum = $totalPum + $request->pum_brgy;
        $totalQuarantine = $request->pum_brgy_completed_quarantine;

        if ($totalPum < $totalQuarantine) {
            return response()->json(['error' => 'Total Quarantine exceeds total PUM'], 401);
        }
        
        $checkIfEncoded = $this->model->where('date_updated', $request->date_updated)
                            ->where('municipality_id',$request->municipality_id )
                            ->where('barangay_id',$request->barangay_id )
                            ->count();
        if ($checkIfEncoded > 0) {
            return response()->json(['error' => 'You already added data to this date'], 401);
        }

        return $this->model->create($request->all());
    }

    public function edit($id) {
        return $this->model->with(['barangay' => function($q){
            return $q->with(['municipality'])->get();
        }])->where('recid', $id)->first();
    }

    public function update(Request $request, $id) {

        $edit = $this->model->findOrFail($id);
        $edit->update($request->all());
        
        return $edit;
    }

    public function destroy($id) {
        $delete = $this->model->findOrFail($id);
        $delete->delete();

        return $delete;
    }

    public function checkBarangayEncoded(Request $request) {
        return $this->model->where('date_updated', $request->date_updated)
                    ->where('municipality_id',$request->municipality_id )
                    ->where('barangay_id',$request->barangay_id )
                    ->count();
    }

    public function getAllTallies() {

        $date = Input::get('date_updated');

        $data = $this->model->select(
            // 'barangay.municipality.recid',
            // 'barangay.recid',
            'pum_brgy',
            'pum_brgy_completed_quarantine',
            'pum_brgy_referred_pui',
            'suspect_home',
            'suspect_facility',
            'suspect_admitted',
            'probable_home',
            'probable_facility',
            'probable_admitted',
            'negative',
            'covid_positive',
            'covid_discharged',
            'covid_deaths',
            'rapid_test',
            'unofficial_test',
            'official_test',
            'date_updated',
            'barangay_id'
        )->with(['barangay'=>function($q) {
            $q->with('municipality');
        }]);

        if ($date!='') {
            $data = $data->where('date_updated', $date);
        }

        $data = $data->get();

        return $data;

    }
}
