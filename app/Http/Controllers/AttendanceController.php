<?php

namespace App\Http\Controllers;

use App\Exports\ExportAttendance;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\AttendanceResource;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('user')->paginate(5);
        return view('absen.index', [
            'attendances' => $attendances,
        ]);
    }

    public function export(){
        return (new ExportAttendance)->download('DataAbsen.xlsx');
    }
}
