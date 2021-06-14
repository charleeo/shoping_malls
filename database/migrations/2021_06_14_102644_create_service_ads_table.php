<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_ads', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->string('price');
            $table->text('service_description');
            $table->mediumText('service_images')->nullable();
            $table->integer('service_shop_id');
            $table->integer('service_category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_ads');
    }
}
