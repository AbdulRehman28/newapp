<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPainTypesTable extends Migration
{
    public function up()
    {
        Schema::table('pain_types', function (Blueprint $table) {
            $table->unsignedBigInteger('pain_id');
            $table->foreign('pain_id', 'pain_fk_5411924')->references('id')->on('pains');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_5412100')->references('id')->on('users');
        });
    }
}
