<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller 
{
  
    public function index()
    {
        return view('users.dashboard');
    }
}
