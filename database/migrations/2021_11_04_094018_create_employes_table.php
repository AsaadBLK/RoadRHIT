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
            $table->string('business');
            $table->string('respH');
            $table->string('ville');
            $table->string('status_reqtoIT');
            $table->string('status_crebyIT');
            $table->string('status_leave');
            $table->string('leave_at');
            $table->string('action_by');
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
