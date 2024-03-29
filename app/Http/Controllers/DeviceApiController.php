<?php

namespace App\Http\Controllers;

use App\Events\DeviceStatusUpdate;
use App\Models\Device;
use App\Models\DeviceStatusHistory;
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
        $deviceCreated->status = $request->status_device??1;
        $deviceCreated->quota = $request->quota??'Kuota belum terdefinisi';
        $deviceCreated->device_type_id = $request->tipe_device??'1';
        $deviceCreated->company_id = $request->company_id??'1';
        $deviceCreated->tegangan = $request->tegangan??'0';
        $deviceCreated->ampere = $request->ampere??'0';
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
        DeviceStatusUpdate::dispatch($id, $request->status_device);
        $device = Device::find($id);
        $device->status = $request->status_device;
        $device->save();

        $deviceStatusHistory = new DeviceStatusHistory();
        $deviceStatusHistory->status = $request->status_device;
        $deviceStatusHistory->device_id = $id;
        $deviceStatusHistory->save();

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
    public function setTipeDevice(Request $request, $id)
    {
        DeviceStatusUpdate::dispatch($id, '', '', '', $request->tipe_device);
        $device = Device::find($id);
        $device->tipe_device = $request->tipe_device??1;
        return $device->save();
    }
    public function setAmpere(Request $request, $id)
    {
        DeviceStatusUpdate::dispatch($id, '', '', '', '', $request->ampere);
        $device = Device::find($id);
        $device->ampere = $request->ampere??0;
        return $device->save();
    }
    public function setTegangan(Request $request, $id)
    {
        DeviceStatusUpdate::dispatch($id, '', '', '', '', '', $request->tegangan);
        $device = Device::find($id);
        $device->tegangan = $request->tegangan??0;
        return $device->save();
    }

    public function updateAllDeviceParameter(Request $request, $id)
    {
        DeviceStatusUpdate::dispatch($id, $request->status_device??'', $request->battery??'', '', '', $request->ampere??'', $request->tegangan??'');
        $device = Device::find($id);
        if (isset($request->status_device)) {
            $device->status = $request->status_device;
        }
        if (isset($request->battery)) {
            $device->battery = $request->battery;
        }
        if (isset($request->ampere)) {
            $device->ampere = $request->ampere;
        }
        if (isset($request->tegangan)) {
            $device->tegangan = $request->tegangan;
        }

        $device->save();

        $deviceStatusHistory = new DeviceStatusHistory();
        $deviceStatusHistory->status = $request->status_device;
        $deviceStatusHistory->device_id = $id;
        $deviceStatusHistory->save();

        return $device->save();


        // if ($request->status_device) {
        //     $this->setStatus($request, $id);
        // }
        // if ($request->ampere) {
        //     $this->setAmpere($request, $id);
        // }
        // if ($request->tegangan) {
        //     $this->setTegangan($request, $id);
        // }
        // $device = Device::find($id);
        // return $device->save();
    }

    // Fungsi biar kelihatan seakan2 nyata
    public function setRandomBattery(Request $request, $id)
    {
        $idToUpdate = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        foreach ($idToUpdate as $value) {
            $randomBatteryValue = rand(0, 1);
            $device = Device::find($value);
            $device->battery = $device->battery - $randomBatteryValue;
            $result = $device->save();
            if (!$result) {
                return 0;
            }
            DeviceStatusUpdate::dispatch($value, '', $device->battery - $randomBatteryValue);
        }
        return 1;
    }
    public function setRandomAmpere(Request $request, $id)
    {
        $idToUpdate = [1, 2, 3, 4, 5, 6, 7, 8];
        $defaultAmperePerID = [1=>186.5, 2=>65, 3=>75, 4=>75, 5=>59.75, 6=>37.5, 7=>55, 8=>55];
        foreach ($idToUpdate as $value) {
            $randomAmpereValue = rand(-20, 20)/10;
            $device = Device::find($value);
            $device->ampere = (floor(($defaultAmperePerID[$value] + $randomAmpereValue)*10))/10;
            $result = $device->save();
            if (!$result) {
                // break;
                return 0;
            }
            DeviceStatusUpdate::dispatch($value, '', '', '', '', (floor(($defaultAmperePerID[$value] + $randomAmpereValue)*10))/10);
        }
        return 1;
    }
    public function setRandomVolt(Request $request, $id)
    {
        $idToUpdate = [9];
        $defaultVoltPerID = [9=>14];
        foreach ($idToUpdate as $value) {
            $randomVoltValue = rand(-20, 20)/10;
            $device = Device::find($value);
            $device->tegangan = (floor(($defaultVoltPerID[$value] + $randomVoltValue)*10))/10;
            $result = $device->save();
            if (!$result) {
                // break;
                return 0;
            }
            DeviceStatusUpdate::dispatch($value, '', '', '', '', '', $device->tegangan);
        }
        return 1;
    }

}
