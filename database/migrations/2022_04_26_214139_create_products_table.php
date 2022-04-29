<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail', 100)->nullable();
            $table->string('name', 100);
            $table->integer('value');
            $table->enum('category', ['laptop', 'smart_phone', 'smart_watch', 'tv', 'fridge', 'camera', 'washing_machine']);
            $table->enum('status', ['stocking', 'out_of_stock']);
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
        Schema::dropIfExists('products');
    }
}
