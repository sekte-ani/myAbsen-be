<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function AttendanceIn(Request $request){
        $validateDate = $request->validate([
            ''
        ]);
    }
}
