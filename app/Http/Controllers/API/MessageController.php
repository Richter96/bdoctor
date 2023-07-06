<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;
class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name_patient' => 'required',
            'email_patient' => 'email',
            'text' => 'required',
            'doctor_id' => 'numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_message = new Message();
        $new_message->fill($data);
        $new_message->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
