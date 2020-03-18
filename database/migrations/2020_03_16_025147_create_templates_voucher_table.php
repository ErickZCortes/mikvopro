<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates_voucher', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger("iduser_template")->unsigned();
            $table->foreign("iduser_template")->references("id")->on("users");
            
            $table->string('name_template')->unique();
            $table->string('bgcolor_template')->default("null");
            $table->string('bgimage_template')->default("null");
            $table->string('logo_template');
            $table->string('font_template');
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
        Schema::dropIfExists('templates_voucher');
    }
}
