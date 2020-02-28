<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger("iduser_profile")->unsigned()->nullable();
            $table->foreign("iduser_profile")->references("id")->on("users");
            
            $table->string("name_profile",30)->nullable();
            $table->string("addpool_profile",30);            
            $table->integer("vsubida_profile")->length(5);
            $table->string("sbyte_profile",5);
            $table->integer("vdescarga_profile")->length(5);
            $table->string("dbyte_profile",5);
            $table->integer("cost_profile")->length(5)->nullable();
            $table->string("typet_profile",25);
            $table->integer("limitda_profiles")->length(10);
            $table->time("limitho_profiles",6);
            $table->integer("expireda_profiles")->length(10);
            $table->time("expiredho_profiles",6);
            $table->time("cuttime_profile",6);
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
        Schema::dropIfExists('profiles');
    }
}
