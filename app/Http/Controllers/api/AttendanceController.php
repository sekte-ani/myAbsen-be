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

        return new MyabsenResource(true, 'insert attendance in success', 200, $validateData);
    }

    public function AttendanceInCheck(Request $request){
        $date = date('Y-m-d');
        $id = $request->user();
        $att = Attendance::where([['user_id','=',$id['id']], ['tanggal_masuk','=',$date], ['status', '=', '0']])->get();

        if(!count($att)){
            return response()->json(['status'=> false]);
        }else{
            return response()->json(['status'=>true]);
        }
    }

    public function AttendanceOut(Request $request){
        try{
            $validateData = $request->validate([
                'tanggal_keluar' => 'date|required',
                'jam_keluar' => 'required',
                'lat_out' => 'required',
                'long_out' => 'required'
            ]);

            $validateData['status'] = '1';
            $id = $request->user();

            $date = date('Y-m-d');

            Attendance::where([['user_id','=',$id['id']], ['tanggal_masuk','=',$date]])->update($validateData);
            return new MyabsenResource(true, 'insert attendance out success', 200, $validateData);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 400
            ], 400);
        }
    }

    public function CountAttendance(Request $request){
        $id = $request->user();
        $att = Attendance::where([['user_id','=',$id['id']], ['status','=','1']])->count();

        return response()->json(['data' => $att]);
    }
}
