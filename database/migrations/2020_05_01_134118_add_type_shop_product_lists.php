<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeShopProductLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_product_lists', function (Blueprint $table) {
            $table->enum('type', ['eye-care', 'sunglass','kid-wear',]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shop_product_lists', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
