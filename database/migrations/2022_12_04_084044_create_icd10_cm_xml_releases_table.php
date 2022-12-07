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
        Schema::create('icd10_cm_xml_releases', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('releaseYear')->nullable();
            $table->string('releaseId')->nullable();
            $table->string('language')->nullable();
            $table->string('is_fetch')->default('pending');
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
        Schema::dropIfExists('icd10_cm_xml_releases');
    }
};
