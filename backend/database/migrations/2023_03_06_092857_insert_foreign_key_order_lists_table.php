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
        Schema::table('order_lists', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_lists', function (Blueprint $table) {
            $table->dropForeign('order_lists_order_id_foreign');
            $table->dropIndex('order_lists_order_id_index');
            $table->dropColumn('order_id');
            $table->dropForeign('order_lists_product_id_foreign');
            $table->dropIndex('order_lists_product_id_index');
            $table->dropColumn('product_id');
        });
    }
};
