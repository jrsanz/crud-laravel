<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_persona', function (Blueprint $table) {
            $table->foreignId('area_id')->constrained();
            $table->foreignId('persona_id')->constrained()->onDelete('cascade');  //Es posible eliminar el id de una persona y no afectaría a la relación ya que se eliminaría también
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_persona');
    }
}
