<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Shops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('business_domain')->unique();
            $table->string('business_name')->unique();
            $table->string('description');
            $table->string('business_picture')->default('images/icon/no-image.jpg');
            $table->string('business_email')->nullable();
            $table->string('business_phone_number');
            $table->integer('business_owner_id');
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
        Schema::dropIfExists('shops');
    }
}
