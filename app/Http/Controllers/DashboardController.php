<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('layouts.dashboard');
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
