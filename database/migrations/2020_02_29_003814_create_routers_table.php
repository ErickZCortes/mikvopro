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
            
            $table->string("model_router",30);
            $table->string("router_description",200);
            $table->string("ip_router",15);
            $table->string("user_router",30);
            $table->string("password_router",40);
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