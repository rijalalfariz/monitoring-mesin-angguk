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
            'devices_ampere' => $devices->where('tipe_device', 0),
            'devices_tegangan' => $devices->where('tipe_device', 1),
            'pageTitle' => 'Dashboard'
        ]);
    }

    public function monitoring()
    {
        $devices = Device::all()->sortBy('id');
        return view('monitoring', [
            'devices_ampere' => $devices->where('tipe_device', 0),
            'devices_tegangan' => $devices->where('tipe_device', 1),
            'pageTitle' => 'Monitoring'
        ]);        
    }
}
