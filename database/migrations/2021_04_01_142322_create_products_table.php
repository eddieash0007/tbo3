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
            $table->string('name');
            $table->string('image');
            $table->double('price');
            $table->boolean('size')->nullable();
            $table->string('colour');
            $table->text('details');
            $table->boolean('promotion')->nullable();
            $table->softDeletes();
            $table->timestamps(); 
            $table->integer('category_id');
            $table->string('slug');

            // $table->foreign('category_id')->constrained('categories');
            
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
