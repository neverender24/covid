<?php

namespace App\Http\Controllers;
use App\Tally;
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
}
