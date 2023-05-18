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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("brand");
            $table->string("os");
            $table->string("cpu");
            $table->string("gpu");
            $table->float("screenSize");
            $table->string("resolution");
            $table->float("cameraMegapixels");
            $table->string("cameraQuality");
            $table->integer("ram");
            $table->integer("internalStorage");
            $table->integer("batteryCapacity");
            $table->string("simType");
            $table->float("price");
            $table->string('image');
            $table->boolean('hidden')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
