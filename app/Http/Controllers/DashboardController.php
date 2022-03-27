<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $devices = Device::all()->sortBy('id');
        return view('dashboard', [
            'devices' => $devices,
            'pageTitle' => 'Dashboard'
        ]);
    }
}
