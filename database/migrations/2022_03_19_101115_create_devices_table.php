<?php

use App\Models\Company;
use App\Models\DeviceType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('device_key');
            $table->float('battery');
            $table->integer('status');
            $table->text('quota');
            $table->foreignIdFor(DeviceType::class);
            $table->float('tegangan');
            $table->float('ampere');
            $table->foreignIdFor(Company::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
};
