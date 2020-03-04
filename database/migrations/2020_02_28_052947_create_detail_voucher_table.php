<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_voucher', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger("idvoucher_detailv")->unsigned();
            $table->foreign("idvoucher_detailv")->references("id")->on("vouchers");

            $table->string("server_detailv",30);
            $table->string("user_detailv",20);
            $table->string("password_detailv",25);
            $table->string("limittime_detailv",25);
            $table->string("limitbin_detailv",25)->default('null');
            $table->string("limitout_detailv",25)->default('null');
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
        Schema::dropIfExists('detail_voucher');
    }
}
