<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClickmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clickmaps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('site_id')->unsigned();
            $table->foreign('site_id')
                ->references('id')
                ->on('sites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('page_x');
            $table->integer('page_y');
            $table->dateTimeTz('clicked_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clickmaps');
    }
}
