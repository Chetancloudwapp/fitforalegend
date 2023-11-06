<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategoriess', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->Integer('cat_id');
            $table->foreign('cat_id')->references('id')->on('category')->onDelete('cascade');
            $table->string('status');
            // Other subcategory fields
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
        Schema::dropIfExists('subcategories');
    }
};
