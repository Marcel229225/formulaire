<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //
    {
        Schema::create('users', function (Blueprint $table) {
           /*$table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('role', array('administrateur', 'chef_agence', 'respo_marketing', 'agent_marketing'))->default('agent_marketing')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            //$table->foreign('agence_id')->refecences('id')->on('agence')->nullable();
            $table->timestamps();*/
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');   
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
