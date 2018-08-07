<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->softDeletes();
            $table->dropColumn('status');
            $table->integer('view')->nullable()->default(0)->change();
            $table->dropColumn('warranty');
            $table->decimal('discount', 15, 0)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->integer('status')->unsigned();
            $table->integer('discount')->change();
            $table->integer('view')->default(0)->change();
            $table->string('warranty', 50);
        });
    }
}
