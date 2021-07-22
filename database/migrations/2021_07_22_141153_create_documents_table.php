<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->unsignedBigInteger('user_id');
            $table->string('filename');
            $table->string('extension');
            $table->integer('size');
            $table->unsignedBigInteger('tenant_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
