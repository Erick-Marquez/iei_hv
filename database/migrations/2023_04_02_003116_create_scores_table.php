<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            
            $table->string('n1')->nullable();
            $table->string('n2')->nullable();
            $table->string('n3')->nullable();
            $table->string('n4')->nullable();
            $table->string('p1')->nullable();
            $table->string('pt1')->nullable();
            
            $table->string('n5')->nullable();
            $table->string('n6')->nullable();
            $table->string('n7')->nullable();
            $table->string('n8')->nullable();
            $table->string('p2')->nullable();

            $table->string('n9')->nullable();
            $table->string('n10')->nullable();
            $table->string('n11')->nullable();
            $table->string('p3')->nullable();
            $table->string('pt2')->nullable();

            $table->string('pf2')->nullable();

            $table->string('period');

            $table->foreignId('course_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('section_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
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
        Schema::dropIfExists('score');
    }
};
