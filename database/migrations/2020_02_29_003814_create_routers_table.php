<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routers', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger("iduser_router")->unsigned();
            $table->foreign("iduser_router")->references("id")->on("users");
            
            $table->string("name_router");
            $table->string("model_router");
            $table->string("serialn_router");
            $table->string("ip_router");
            $table->string("user_router");
            $table->string("password_router")->default('null');
            $table->string("port_router");
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
        Schema::dropIfExists('routers');
    }
}