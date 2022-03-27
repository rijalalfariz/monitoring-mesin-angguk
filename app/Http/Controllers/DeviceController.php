<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceRequest $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:devices,device_key,'
            ]);

        $dataToInsert = [
            'device_key' => $validatedData['id'],
            'name' => $validatedData['name']??'Mesin Angguk '.$validatedData['id'],
            'battery' => $validatedData['battery']??100,
            'status' => $validatedData['status']??1,
            'quota' => $validatedData['quota']??1000
        ];

        Device::Create($dataToInsert);

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeviceRequest  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeviceRequest $request, Device $device, $id)
    {
        $device = Device::find($id);
        $device->name = $request->DeviceName;
        $data = [
            'status' => $device->save(),
            'DeviceName' => $device->save()?$request->DeviceName:''
        ];
        return json_encode($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device, $id)
    {
        $device = Device::find($id);
        $data = [
            'status' => $device->delete()
        ];
        return json_encode($data);
    }

    public function setStatus()
    {
        
    }
    public function setBattery()
    {
        
    }
    public function setQuota()
    {
        
    }
}
