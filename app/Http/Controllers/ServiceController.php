<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        return view('auth.create_service');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:25'],
            'price'=> ['required','string','max:6'],
            'timeRange_hour'=>'integer',
            'timeRange_minutes'=>'integer',

        ]);
        $data['company_id']= session()->get('company_id');

        Service::create($data);

        return redirect(route('company.step4'));
    }
    public function update()
    {
    }
    public function destroy()
    {
    }
}


