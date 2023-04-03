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
            
            $table->string('n1');
            $table->string('n2');
            $table->string('n3');
            $table->string('n4');
            $table->string('p1');
            $table->string('pt1');
            
            $table->string('n5');
            $table->string('n6');
            $table->string('n7');
            $table->string('n8');
            $table->string('p2');

            $table->string('n9');
            $table->string('n10');
            $table->string('n11');
            $table->string('p3');
            $table->string('pt2');

            $table->string('pf2');

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
