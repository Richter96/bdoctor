<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use File;
use Response;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

 
class PdfController extends Controller
{
    public function index(){
        $user_id = Auth::id();
        $doctor = Doctor::find($user_id);
       return response()->file(public_path('storage/' . $doctor->cv),['content-type'=>'application/pdf']);
    }
}