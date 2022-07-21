<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Device;
use App\Models\DeviceStatusHistory;
use App\Models\DeviceType;
use App\Models\Position;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dump_function_test(Request $request)
    {
        $result = [];

        // $user = User::find(1);

        // $result = [
        //     1 => $user->company->address,
        //     2 => $user->position->name
        // ];

        // ==========================================

        // $deviceHistory = new DeviceStatusHistory();
        // $deviceHistory->status = 0;
        // $deviceHistory->device_id = 12;
        // $result[0] = $deviceHistory->save();

        // $deviceHistory = new DeviceStatusHistory();
        // $deviceHistory->status = 0;
        // $deviceHistory->device_id = 2;
        // $result[1] = $deviceHistory->save();

        // $deviceHistory = new DeviceStatusHistory();
        // $deviceHistory->status = 1;
        // $deviceHistory->device_id = 3;
        // $result[2] = $deviceHistory->save();

        // $company = new Company();
        // $company->name = 'PT. Pertamina EP Cepu';
        // $company->address = 'Ledok, Cepu';
        // $result[0] = $company->save();


        // $position = new Position();
        // $position->name = 'Admin';
        // $result[1] = $position->save();

        // $position = new Position();
        // $position->name = 'Operator';
        // $result[2] = $position->save();

        // $device_type = new DeviceType();
        // $device_type->name = 'Elektrik Motor';
        // $result[3] = $device_type->save();

        // $device_type = new DeviceType();
        // $device_type->name = 'Gas Engine';
        // $result[4] = $device_type->save();
        
        $device_type = new DeviceType();
        $device_type->name = 'Mesin Belum Terpasang';
        $result[0] = $device_type->save();

        // $user = new User();
        // $user->username = 'admin';
        // $user->password = bcrypt('12345678');
        // $user->position_id = 1;
        // $user->company_id = 1;
        // $result[5] = $user->save();

        // $user = new User();
        // $user->username = 'operator';
        // $user->password = bcrypt('12345678');
        // $user->position_id = 2;
        // $user->company_id = 1;
        // $result[6] = $user->save();

        // $result[7] = $this->make_dump_device('L. 226');
        // $result[8] = $this->make_dump_device('L. 169');
        // $result[9] = $this->make_dump_device('L. 177');
        // $result[10] = $this->make_dump_device('L. 255');
        // $result[11] = $this->make_dump_device('Ld. 13');
        // $result[12] = $this->make_dump_device('Ld. 08');
        // $result[13] = $this->make_dump_device('L. 229');
        // $result[14] = $this->make_dump_device('L. 235');

        // $result[15] = $this->make_dump_device('L. 210 Cat', 2);
        // $result[16] = $this->make_dump_device('L. 154 Arrow', 2);
        // $result[17] = $this->make_dump_device('L. 221 Arrow', 2);
        // $result[18] = $this->make_dump_device('L. 182 Cat', 2);
        // $result[19] =  $this->make_dump_device('L. 158 Arrow', 2);
        // $result[20] = $this->make_dump_device('Lp. 01 Cat', 2);
        // $result[21] = $this->make_dump_device('Lp. 02 Arrow', 2);
        // $result[22] = $this->make_dump_device('L. 163 Arrow', 2);
        // $result[23] = $this->make_dump_device('L. 207 Arrow', 2);

        $result[1] = $this->make_dump_device('Mesin Kosong 1', 3);
        $result[2] = $this->make_dump_device('Mesin Kosong 2', 3);
        $result[3] = $this->make_dump_device('Mesin Kosong 3', 3);
        return json_encode($result);
    }

    public function make_dump_device($deviceName, $deviceType = 1)
    {
        $deviceCreated = new Device();
        $deviceCreated->device_key = '';
        $deviceCreated->name = $deviceName;
        $deviceCreated->battery = 100;
        $deviceCreated->status = 1;
        $deviceCreated->quota = 'Kuota belum terdefinisi';
        $deviceCreated->tegangan = '0';
        $deviceCreated->ampere = '0';
        $deviceCreated->device_type_id = $deviceType;
        $deviceCreated->company_id = 1;
        $deviceCreated->save();

        if ($deviceCreated->save()) {
            return $deviceCreated->id;
        }
        return 0;    
    }

}
