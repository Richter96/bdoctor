<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Doctor;

class WelcomeController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();
        return view('welcome', compact('specializations'));
    }

    public function show(Request $request)
    {
        $specialization_id_selected = $request->request->get('specializations');
        
        dd($specialization_id_selected);
        return view('welcome');
    }
}
