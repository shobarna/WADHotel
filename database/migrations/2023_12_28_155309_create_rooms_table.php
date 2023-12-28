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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc')->nullable();
        });

        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('capacity');
            $table->text('desc')->nullable();
            $table->timestamps();
        });

        Schema::create('facility_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('number', 5);
            $table->foreignId('type_id')->constrained()->onDelete('cascade');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('facility_type');
        Schema::dropIfExists('types');
        Schema::dropIfExists('facilities');
    }
};
