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
        Schema::create('icd10_cm_xml_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->string('slug')->nullable();
            $table->string('releaseYear')->nullable();
            $table->string('code')->nullable();
            $table->string('chapter_code')->nullable();
            $table->string('section_code')->nullable();
            $table->string('branch_code')->nullable();
            $table->string('leaf_code')->nullable();
            $table->string('sub_leaf_code')->nullable();
            $table->string('leaf_point_code')->nullable();
            $table->string('classKind')->nullable();
            $table->string('releaseDate')->nullable();
            $table->string('releaseId')->nullable();
            $table->string('language')->nullable();
            $table->string('title',1000)->nullable();
            $table->text('definition')->nullable();
            $table->text('notes')->nullable();
            $table->text('codingHint')->nullable();
            $table->text('includes')->nullable();
            $table->text('excludes1')->nullable();
            $table->text('excludes2')->nullable();
            $table->text('useAdditionalCode')->nullable();
            $table->text('inclusionTerm')->nullable();
            $table->text('codeFirst')->nullable();
            $table->text('codeAlso')->nullable();
            $table->text('clinicalInformation')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('icd10_cm_xml_records')->onDelete('cascade')->onUpdate('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icd10_cm_xml_records');
    }
};
