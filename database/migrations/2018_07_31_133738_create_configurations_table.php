<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->unique();
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('man_hinh', 128);
            $table->string('he_dieu_hanh', 128);
            $table->string('camera_sau', 100);
            $table->string('camera_truoc', 100);
            $table->string('ram', 100);
            $table->string('bo_nho', 100);
            $table->string('dung_luong_pin', 100);
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
        Schema::dropIfExists('configurations');
    }
}
