<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeviceStatusUpdate implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $status;
    public $battery;
    public $quota;
    public $deviceID;
    public $tipe_device;
    public $ampere;
    public $tegangan;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($deviceID, $status='', $battery='', $quota='',  $tipe_device='',  $ampere='',  $tegangan='', $message='')
    {
        $this->message = $message;
        $this->status = $status;
        $this->battery = $battery;
        $this->quota = $quota;
        $this->deviceID = $deviceID;
        $this->tipe_device = $tipe_device;
        $this->ampere = $ampere;
        $this->tegangan = $tegangan;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('device-status');
    }
}
