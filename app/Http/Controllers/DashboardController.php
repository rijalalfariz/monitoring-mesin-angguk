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
            'devices_ampere' => $devices->where('device_type_id', 1),
            'devices_tegangan' => $devices->where('device_type_id', 2),
            'pageTitle' => 'Dashboard'
        ]);
    }

    public function monitoring()
    {
        $devices = Device::all()->sortBy('id');
        return view('monitoring', [
            'devices_ampere' => $devices->where('device_type_id', 1),
            'devices_tegangan' => $devices->where('device_type_id', 2),
            'pageTitle' => 'Monitoring'
        ]);        
    }
}
