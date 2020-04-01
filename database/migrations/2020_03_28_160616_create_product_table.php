<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->unsigned();
            $table->integer('frame_id')->nullable()->default(null)->unsigned();
            $table->integer('frame_category_id')->nullable()->default(null)->unsigned();
            $table->integer('glass_id')->nullable()->default(null)->unsigned();
            $table->integer('lens_id')->nullable()->default(null)->unsigned();
            $table->integer('sunglass_id')->nullable()->default(null)->unsigned();
            $table->integer('discount_id')->nullable()->default(null)->unsigned();
            $table->boolean('is_active')->nullable()->default(0);
            $table->string('price');
            $table->string('warranty')->nullable()->default(null);
            $table->string('shape');
            $table->string('title');
            $table->string('slug');
            $table->string('size')->nullable()->default(null);
            $table->string('style')->nullable()->default(null);
            $table->boolean('shipping')->nullable()->default(0);
            $table->longText('description');
            $table->string('product_number');
            $table->string('image')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
