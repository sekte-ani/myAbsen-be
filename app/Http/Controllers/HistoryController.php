<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $leaves = Leave::where('status', '!=', 'tunggu')->paginate(5);
        return view('cuti.history', ['leaves' => $leaves]);
    }
}
