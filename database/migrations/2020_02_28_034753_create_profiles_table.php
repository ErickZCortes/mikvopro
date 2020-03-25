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
            $table->string("addpool_profile");            
            $table->string("cost_profile");
            $table->string("sprice_profile");
            $table->integer("sharedu_profile");
            $table->integer("vsubida_profile");
            $table->string("sbyte_profile");
            $table->integer("vdescarga_profile");
            $table->string("dbyte_profile");
            $table->string("expmode_profile");
            $table->string("validation_profile");
            $table->string("gracep_profile");
            $table->string("typet_profile");
            $table->integer("limitda_profiles");
            $table->time("limitho_profiles");
            $table->integer("expireda_profiles");
            $table->time("expiredho_profiles");
            $table->time("cuttime_profile");
            $table->string("lockuser_profile");
            $table->string("parentq_profiles");
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
