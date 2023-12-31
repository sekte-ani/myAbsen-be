<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Exports\ExportLeave;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\LeaveResource;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::where('status', 'tunggu')->paginate(5);
        return view('cuti.index', ['leaves' => $leaves]);
    }

    public function show($id)
    {
        $leaves = Leave::with('user')->findOrFail($id);
        return view('cuti.show', ['leaves' => $leaves]);
    }

    public function accept(Leave $leave)
    {
        Leave::where('id', $leave->id)->update(array('status' => 'diterima'));
        return redirect('/cuti')->with('success', "Post has been updated!");
    }

    public function decline(Leave $leave)
    {
        Leave::where('id', $leave->id)->update(array('status' => 'ditolak'));
        return redirect('/cuti')->with('success', "Post has been updated!");
    }

    public function destroy($id)
    {
        $deletedLeave = Leave::findOrFail($id);
        $deletedLeave->delete();

        return redirect('/cuti');
    }
}
