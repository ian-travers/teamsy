<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
