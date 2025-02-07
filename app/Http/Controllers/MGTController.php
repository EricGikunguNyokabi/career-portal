<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MGTController extends Controller
{
    //
    public function dashboard()
    {
        return view('mgt.dashboard');
    }
}
