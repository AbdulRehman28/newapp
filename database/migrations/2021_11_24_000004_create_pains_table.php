<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePainsTable extends Migration
{
    public function up()
    {
        Schema::create('pains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pain')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
