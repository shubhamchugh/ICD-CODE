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
            $table->string('liner_id')->nullable();
            $table->string('liner_id_code')->nullable();
            $table->string('liner_id_residual')->nullable();
            $table->string('code')->nullable();
            $table->string('blockId')->nullable();
            $table->string('codeRange')->nullable();
            $table->string('classKind')->nullable();
            $table->string('releaseDate')->nullable();
            $table->string('releaseId')->nullable();
            $table->string('language')->nullable();
            $table->string('linear_url',1000)->nullable();
            $table->string('foundation_url',1000)->nullable();
            $table->string('title',1000)->nullable();
            $table->text('definition')->nullable();
            $table->text('longDefinition')->nullable();
            $table->text('codingNote')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('browserUrl',1000)->nullable();
            $table->text('synonym')->nullable();
            $table->text('narrowerTerm')->nullable();
            $table->text('relatedEntitiesInPerinatalChapter')->nullable();
            $table->text('relatedEntitiesInMaternalChapter')->nullable();
            $table->text('diagnosticCriteria')->nullable();
            $table->text('fullySpecifiedName')->nullable();
            $table->text('parent')->nullable();
            $table->text('ancestor')->nullable();
            $table->text('descendant')->nullable();
            $table->text('foundationChildElsewhere')->nullable();
            $table->mediumText('indexTerm')->nullable();
            $table->text('inclusion')->nullable();
            $table->text('exclusion')->nullable();
            $table->text('postcoordinationScale')->nullable();
            $table->text('api_data')->nullable();
            $table->string('is_scraped')->default('pending');
            $table->softDeletes();
            $table->timestamps();


           $table->unique(['liner_id','releaseId','language']);
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
