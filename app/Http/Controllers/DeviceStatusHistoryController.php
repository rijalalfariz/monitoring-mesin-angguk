<?php

namespace App\Http\Controllers;

use App\Models\DeviceStatusHistory;
use App\Http\Requests\StoreDeviceStatusHistoryRequest;
use App\Http\Requests\UpdateDeviceStatusHistoryRequest;

class DeviceStatusHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreDeviceStatusHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceStatusHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeviceStatusHistory  $deviceStatusHistory
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceStatusHistory $deviceStatusHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeviceStatusHistory  $deviceStatusHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceStatusHistory $deviceStatusHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeviceStatusHistoryRequest  $request
     * @param  \App\Models\DeviceStatusHistory  $deviceStatusHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeviceStatusHistoryRequest $request, DeviceStatusHistory $deviceStatusHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeviceStatusHistory  $deviceStatusHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceStatusHistory $deviceStatusHistory)
    {
        //
    }
}
