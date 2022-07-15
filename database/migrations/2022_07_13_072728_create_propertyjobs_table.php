<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyjobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propertyjobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(false)->constrained();
            $table->foreignId('property_id')->nullable(false)->constrained();
            $table->string('summary',150)->nullable(false);
            $table->string('description',500)->nullable(false);
            $table->enum('status',['open','in progress', 'completed','cancelled'])->default('open');
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
        Schema::dropIfExists('propertyjobs');
    }
}
