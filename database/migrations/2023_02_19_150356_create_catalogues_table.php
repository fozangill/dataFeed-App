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
        Schema::create('catalogues', function (Blueprint $table) {
            $table->id();
            $table->integer('entity_id');
            $table->string('CategoryName');
            $table->string('sku');
            $table->string('name');
            $table->string('shortdesc');
            $table->float('price');
            $table->string('link');
            $table->string('image');
            $table->string('Brand');
            $table->integer('Rating');
            $table->string('CaffeineType');
            $table->integer('Count');
            $table->integer('Flavored');
            $table->string('Seasonal');
            $table->string('Instock');
            $table->integer('Facebook');
            $table->integer('IsKCup');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogues');
    }
};
