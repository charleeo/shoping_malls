<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->enum('status',[0,1])->comment('0= not available, 1= available')->default(1);
            $table->string('coupon_code')->nullable();
            $table->enum('public_visibility',['yes','no'])->default('no');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['coupon_code','public_visibility','status']);
          });
    }
}
