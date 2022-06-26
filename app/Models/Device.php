<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_key',
        'name',
        'battery',
        'status',
        'kuota'
    ];

    public function device_type()
    {
        return $this->belongsTo(DeviceType::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function device_status_histories()
    {
        return $this->hasMany(DeviceStatusHistory::class);
    }
}
