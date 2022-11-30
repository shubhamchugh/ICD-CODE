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
        Schema::create('icd10_records', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('code')->nullable();
            $table->string('classKind')->nullable();
            $table->string('releaseDate')->nullable();
            $table->string('releaseId')->nullable();
            $table->string('language')->nullable();
            $table->string('linear_url',1000)->nullable();
            $table->string('title',1000)->nullable();
            $table->text('definition')->nullable();
            $table->text('longDefinition')->nullable();
            $table->text('fullySpecifiedName')->nullable();
            $table->text('note')->nullable();
            $table->text('codingHint')->nullable();
            $table->text('inclusion')->nullable();
            $table->text('exclusion')->nullable();
            $table->text('exclusion2')->nullable();
            $table->text('additionalCode')->nullable();
            $table->text('codeAlso')->nullable();
            $table->text('parent')->nullable();
            $table->string('browserUrl',1000)->nullable();
            $table->text('api_data')->nullable();
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
        Schema::dropIfExists('icd10_records');
    }
};
