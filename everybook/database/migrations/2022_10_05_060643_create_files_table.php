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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->text('up_name');
            $table->string('real_name');
            $table->unsignedInteger('size')->default(0);
            $table->string('extension', 10)->default("");
            $table->unsignedSmallInteger('download')->default(0);
            $table->unsignedSmallInteger('width')->default(0);
            $table->unsignedSmallInteger('height')->default(0);
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
        Schema::dropIfExists('files');
    }
};
