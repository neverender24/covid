<?php

namespace App\Http\Controllers;
use App\Tally;
use App\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return$this->model->create($request->all());
    }

    public function edit($id) {
        return $this->model->where('recid', $id)->first();
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
}
