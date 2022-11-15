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
        Schema::create('icd11_records', function (Blueprint $table) {
            $table->id();
            $table->string('releaseDate')->nullable();
            $table->string('releaseId')->nullable();
            $table->string('language')->nullable();
            $table->string('linear_url')->nullable();
            $table->string('foundation_url')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('category')->nullable();
            $table->string('browserUrl')->nullable();
            $table->string('is_scraped')->default('pending');
            $table->softDeletes();
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
        Schema::dropIfExists('icd11_records');
    }
};
