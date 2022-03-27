<?php

namespace App\Http\Controllers;

use App\Events\DeviceStatusUpdate;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceApiController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deviceCreated = new Device;
        $deviceCreated->device_key = $request->device_key??'';
        $deviceCreated->name = '';
        $deviceCreated->battery = $request->battery??100;
        $deviceCreated->status = $request->status??1;
        $deviceCreated->quota = $request->quota??1000;
        $deviceCreated->save();
        $deviceCreated->name = $request->name??'Mesin Angguk '.$deviceCreated->id;
        $deviceCreated->save();

        if ($deviceCreated->save()) {
            return $deviceCreated->id;
        }
        return 0;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }

    public function setStatus(Request $request, $id)
    {
        DeviceStatusUpdate::dispatch($id, $request->status);
        $device = Device::find($id);
        $device->status = $request->status??1;
        return $device->save();
    }
    public function setBattery(Request $request, $id)
    {
        DeviceStatusUpdate::dispatch($id, '', $request->battery);
        $device = Device::find($id);
        $device->battery = $request->battery??1;
        return $device->save();
    }
    public function setQuota(Request $request, $id)
    {
        DeviceStatusUpdate::dispatch($id, '', '', $request->quota);
        $device = Device::find($id);
        $device->quota = $request->quota??1;
        return $device->save();
    }

}
