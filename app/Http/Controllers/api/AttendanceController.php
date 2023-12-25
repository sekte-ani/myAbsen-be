<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyabsenResource;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function AttendanceIn(Request $request){
        $validateData = $request->validate([
            'tanggal_masuk' => 'date|required',
            'jam_masuk' => 'required',
            'lat_in' => 'required',
            'long_in' => 'required'
        ]);

        $validateData['status'] = "0";

        $id = $request->user();

        $validateData['user_id'] = $id['id'];

        Attendance::create($validateData);

        return new MyabsenResource(true, 'success', 200, $validateData);
    }
}
