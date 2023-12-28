<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyabsenResource;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{

    public function Index(Request $request){
        $id = $request->user();

        $data = Leave::where('user_id', $id['id'])->latest('updated_at')->first();
        return new MyabsenResource(true, 'success', 200, $data);

    }
    public function InputLeave(Request $request){
        $validateData = $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'alasan' => 'required'
        ]);

        $id = $request->user();

        $validateData['user_id'] = $id['id'];

        Leave::create($validateData);
        return new MyabsenResource(true, 'insert leave employee is success', 200, $validateData);

    }

    public function CountLeave(Request $request){
        $id = $request->user();
        $att = Leave::where([['user_id','=',$id['id']], ['status','=','diterima']])->count();

        return response()->json(['data' => $att]);
    }

}
