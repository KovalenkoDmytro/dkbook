<?php

namespace App\Http\Controllers;

use App\Models\CompanyOwner;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $owner = CompanyOwner::with('company.employees.scheduled', 'company.employees.services', 'company.clients')
            ->where('id', \auth()->id())
            ->first();
        return view('auth.client.index', [
            'clients' => $owner->company->clients->paginate(3),
        ]);
    }

    public function create()
    {
        return view('auth.client.create');
    }

    public function store(Request $request)
    {

    }

    public function show(Request $request, $id)
    {


        return view('auth.client.show');
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {
        dump($id);
    }
}
