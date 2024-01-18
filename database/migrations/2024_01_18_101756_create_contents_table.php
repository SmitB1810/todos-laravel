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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('position')->nullable();
            $table->boolean('autoplay')->nullable();
            $table->boolean('add_button')->nullable();
            $table->bigInteger('autoplay_interval')->nullable();
            $table->string('heading')->nullable();
            $table->boolean('show_page_indicator')->nullable();
            $table->boolean('enable_infinite_scroll')->nullable();
            $table->boolean('overlay_page_indicator')->nullable();
            $table->bigInteger('viewport_fraction')->nullable();
            $table->bigInteger('height')->nullable();
            $table->float('aspect_ratio', 8, 2)->nullable();
            $table->json('images')->nullable();
            $table->unsignedBigInteger('comp_id');
            $table->foreign('comp_id')
                    ->references('id')
                    ->on('components')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('contents');
    }
};
