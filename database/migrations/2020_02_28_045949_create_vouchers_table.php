<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger("iduser_voucher")->unsigned();
            $table->foreign("iduser_voucher")->references("id")->on("users");
            
            $table->string("dnsname_voucher",25);            
            $table->integer("nusers_voucher")->length(30)->nullable();
            $table->string("server_voucher",25)->default('null');
            $table->string("prefix_voucher",30)->nullable();
            $table->bigInteger("idprofile_voucher")->unsigned()->nullable();
            $table->foreign("idprofile_voucher")->references("id")->on("profiles");
            $table->string("nprofile_voucher",30)->nullable();
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
        Schema::dropIfExists('vouchers');
    }
}
