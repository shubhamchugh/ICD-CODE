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
            $table->string('code')->nullable();
            $table->string('blockId')->nullable();
            $table->string('codeRange')->nullable();
            $table->string('classKind')->nullable();
            $table->string('releaseDate')->nullable();
            $table->string('releaseId')->nullable();
            $table->string('language')->nullable();
            $table->string('linear_url',700)->nullable();
            $table->string('foundation_url',700)->nullable();
            $table->string('title',700)->nullable();
            $table->text('definition')->nullable();
            $table->text('codingNote')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('browserUrl',700)->nullable();
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
