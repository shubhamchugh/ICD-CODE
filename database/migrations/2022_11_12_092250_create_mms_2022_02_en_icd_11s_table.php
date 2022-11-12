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
        Schema::create('mms_2022_02_en_icd_11s', function (Blueprint $table) {
            $table->id();
            $table->string('releaseDate');
            $table->string('releaseId');
            $table->string('language');
            $table->string('linear_url');
            $table->string('foundation_url');
            $table->string('description');
            $table->integer('parent_id');
            $table->string('category');
            $table->string('browserUrl');
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
        Schema::dropIfExists('mms_2022_02_en_icd_11s');
    }
};
