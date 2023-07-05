<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    public function index() {



        return response()->json([
            'success' => true,
            'specializations' => Specialization::all(),
        ]);
    }
}