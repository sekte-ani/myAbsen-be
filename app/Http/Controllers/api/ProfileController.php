<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyabsenResource;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function Index(Request $request){
        $data = $request->user();

        return new MyabsenResource(true, 'success', 200, $data);
    }

    public function Update(Request $request){
        try{
            $validateData = $request->validate([
                'email' => 'required|string|unique:users|email:dns',
                'phone' => 'required',
                'born' => 'required|date',
                'address' => 'required'
            ]);

            $id = $request->user();


            User::where('id',$id['id'])->update($validateData);
            return new MyabsenResource(true, 'update profile success', 200, $validateData);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 400
            ], 400);
        }
    }
}
