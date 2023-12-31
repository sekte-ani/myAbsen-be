<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use App\Exports\ExportUser;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $presents = Attendance::all()->count();
        $employees = User::where('role', '!=', 'admin')->count();
        $users = User::where('role', '!=', 'admin')->orderBy('name', 'asc')->paginate(5);
        return view('dashboard.index', [
            'users' => $users,
            'employees' => $employees,
            'presents' => $presents
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'nomor_induk' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $validatedData['password'] = Hash::make("defaultpassword");
        $validatedData['role'] = "employee";

        User::create($validatedData);
        return redirect('/');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.modal.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $user = User::findOrFail($id);
        
        $user->update($validatedData);
        return redirect('/');
    }

    public function destroy($id)
    {
        $deletedUser = User::findOrFail($id);
        $deletedUser->delete();

        return redirect('/');
    }
}
