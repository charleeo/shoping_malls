<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyServiceAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_ads', function (Blueprint $table) {
            $table->enum('status',[0,1])->comment('0= not available, 1= available')->default(1);
            $table->string('service_location');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_ads', function (Blueprint $table) {
            $table->dropColumn(['status','service_location']);           
        });
    }
}
