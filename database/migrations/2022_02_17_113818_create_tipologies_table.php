<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipologiesTable extends Migration
{
    public function up()
    {
        Schema::create('tipologies', function (Blueprint $table) {
            $table->id();
            $table->string('nometipologia');
            $table->string('nometipologia1');
            $table->string('nometipologia2');
            $table->string('nometipologia3');
            $table->string('nometipologia5');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipologies');
    }
}
