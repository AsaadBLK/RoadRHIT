<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomprenom')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_request_at')->nullable();
            $table->timestamp('email_create_at')->nullable();
            $table->string('matricule');
            //$table->string('business')->nullable();
            $table->string('respH');
            $table->string('ville');
            $table->string('status_reqtoIT')->nullable();
            $table->string('status_crebyIT')->nullable();
            $table->string('status_leave')->nullable();
            $table->string('leave_at')->nullable();
            $table->string('action_by');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
