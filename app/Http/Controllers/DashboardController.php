<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('layouts.stacked');
    }

    public function showPDRB()
    {
        return view('layouts.pdrb');
    }

    public function showKesejahteraan()
    {
        return view('layouts.kesejahteraan');
    }
}
