<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePainTypesTable extends Migration
{
    public function up()
    {
        Schema::create('pain_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pain_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
