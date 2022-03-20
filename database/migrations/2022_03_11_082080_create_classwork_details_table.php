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
        Schema::create('classwork_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->nullable(); // NOTE [handle null object]
            $table->morphs('classwork');
            $table->string('title');
            $table->text('description')->nullable();
            $table->json('attachments')->nullable();
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
        Schema::dropIfExists('classwork_details');
    }
};
