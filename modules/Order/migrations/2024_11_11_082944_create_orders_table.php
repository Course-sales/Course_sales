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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->nullable();
            $table->float('total', 10)->default(0);
            $table->integer('order_status_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('order_status_id')->references('id')->on('orders_status')->onDelete('set null');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
