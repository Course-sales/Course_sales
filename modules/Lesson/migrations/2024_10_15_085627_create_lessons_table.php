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
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('course_id')->unsigned()->nullable();
            $table->integer('video_id')->unsigned()->nullable();
            $table->integer('document_id')->unsigned()->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->boolean('is_trial')->default(false);
            $table->integer('views')->default(0);
            $table->integer('position')->default(0);
            $table->float('durations');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses')->nullOnDelete();
            $table->foreign('video_id')->references('id')->on('videos')->nullOnDelete();
            $table->foreign('document_id')->references('id')->on('documents')->nullOnDelete();
            $table->foreign('parent_id')->references('id')->on('lessons')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
