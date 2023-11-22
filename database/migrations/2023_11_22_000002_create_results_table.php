<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('top')->default(0);
            $table->integer('left')->default(0);
            $table->integer('bottom')->default(0);
            $table->integer('right')->default(0);
            $table->string('angle')->nullable();
            $table->string('distance')->nullable();
            $table->string('subject')->nullable();
            $table->string('clarity')->nullable();
            $table->string('obscured')->nullable();
            $table->string('orientation')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('image_id');
            $table->foreign('image_id')
                ->references('id')
                ->on('images');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
